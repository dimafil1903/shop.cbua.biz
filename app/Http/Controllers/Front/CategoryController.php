<?php

namespace App\Http\Controllers\Front;

use App\Shop\Categories\Repositories\CategoryRepository;
use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Shop\Products\Product;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Shop\Products\Transformations\ProductTransformable;
class CategoryController extends Controller
{
    private $categoryRepo;
    use ProductTransformable;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepo;
    public function __construct(CategoryRepositoryInterface $categoryRepository,
                                ProductRepositoryInterface $productRepository
    )
    {
        $this->categoryRepo = $categoryRepository;
        $this->productRepo = $productRepository;
    }
    public function search()
    {
        $list = $this->productRepo->listProducts();

        if (request()->has('q') && request()->input('q') != '') {
            $list = $this->productRepo->searchProduct(request()->input('q'));
        }



        $products = $list->map(function (Product $item) {
            return $this->transformProduct($item);
        });

        return view('front.products.product-search', [
            'products' => $this->productRepo->paginateArrayResults($products->all(), 10)
        ]);
    }
    /**
     * Find the category via the slug
     *
     * @param string $slug
     * @return \App\Shop\Categories\Category
     */
    public function getCategory(string $slug)
    {
        $category = $this->categoryRepo->findCategoryBySlug(['slug' => $slug]);






       if(request()->has('show') && request()->input('show') != ''  && request()->has('min_price') && request()->input('min_price') != ''  && request()->has('max_price') && request()->input('max_price') != ''  && request()->has('order_by') && request()->input('order_by') == 'price_asc'||request()->input('order_by') == 'price_desc'||request()->input('order_by') == 'name'||request()->input('order_by') == 'updated_at'||request()->input('order_by') == 'price_asc'){

           if(request()->input('order_by') == 'price_asc'){
               $ascordesc="asc";
               $sort_by = 'price';

               $show = request()->input('show');
           }else if(request()->input('order_by') == 'price_desc'){
               $ascordesc="desc";
               $sort_by = 'price';
               $show = request()->input('show');
           }
           else{
               $ascordesc="desc";
               $show = request()->input('show');
               $sort_by = request()->input('order_by');

           }
           $min=request()->input('min_price');
           $max=request()->input('max_price');
           $products = DB::table('category_product')
               ->leftjoin('products', 'products.id', '=', 'category_product.product_id')
               ->leftjoin('categories', 'categories.id', '=', 'category_product.category_id')
               ->where('categories.slug', $slug)
               ->where('products.price', '>', $min)
               ->where('products.price', '<', $max)
               ->select('products.*')
               ->orderBy($sort_by, $ascordesc)
               ->paginate(request()->input('show'));
}
        else{
            $sort_by= '';
            $show='';

            $products = DB::table('category_product')
                ->leftjoin('products', 'products.id', '=', 'category_product.product_id')
                ->leftjoin('categories', 'categories.id', '=', 'category_product.category_id')
                ->where('categories.slug', $slug)
                ->select('products.*')
                ->orderBy('updated_at', 'desc')
                ->paginate(10);

        }
        $min=request()->input('min_price');
        $max=request()->input('max_price');
        $atributes_sort=DB::table('products')->select('products.updated_at','products.name','products.price');

        $products_action = DB::table('category_product')

            ->join('products', 'category_product.product_id', '=', 'products.id')
            ->join('categories', 'category_product.category_id', '=', 'categories.id')
            ->where('products.front_status','=','action')
            ->where('categories.parent_id','=',1)
            ->select('products.*')
            ->take('5')
            ->orderBy("updated_at",'desc')
            ->get();
            $categoryName=DB::table('categories')
            ->where('slug',$slug)
            ->first();
        return view('front.categories.category', [
            'show'=>$show,
            'atributes_sort'=>  $atributes_sort,
            'sort_by'=>$sort_by,
            'category' => $category,
            'products' => $products,
            'categoryName' =>$categoryName,
            'min'=> $min,
            'max'=> $max,
            'products_action'=> $products_action,
        ]);
    }
}
