<?php

namespace App\Http\Controllers\Front;

use App\Shop\AttributeValues\AttributeValue;

use App\Shop\Categories\Repositories\CategoryRepository;
use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Shop\ProductAttributes\ProductAttribute;
use App\Shop\Products\Product;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Shop\Products\Transformations\ProductTransformable;
use Illuminate\Support\Collection;
use App\Http\Controllers\Front\CartController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    use ProductTransformable;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepo;
private $categoryRepo;

    /**
     * ProductController constructor.
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository,CategoryRepositoryInterface $categoryRepository)
    {
        $this->productRepo = $productRepository;
        $this->categoryRepo = $categoryRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search()
    {



        if (request()->has('q') && request()->input('q') != '' && request()->has('category') && request()->input('category') != '') {
            $products= DB::table('category_product')
                ->join('categories', 'category_product.category_id', '=', 'categories.id')
                ->join('products', 'category_product.product_id', '=', 'products.id')
                ->where('categories.parent_id', '=', '1')
                ->where('categories.slug','=', request()->input('category'))
                ->select('category_product.*', 'categories.name as category','categories.slug as categoryslug', 'products.*')
                ->orderBy("updated_at")
                ->paginate(50);
            $search_products= DB::table('category_product')
                ->join('categories', 'category_product.category_id', '=', 'categories.id')
                ->join('products', 'category_product.product_id', '=', 'products.id')
         
                ->where('products.name','like', '%' . request()->input('q') . '%')
                ->orWhere('products.description', 'like', '%' . request()->input('q') . '%')
                ->select('category_product.*', 'categories.name as category','categories.slug as categoryslug', 'products.*')
                ->orderBy("updated_at")
                ->paginate(50);
         
            $categ=request()->input('category');
            if($categ=='all'){
                $products = DB::table('category_product')
                    ->join('categories', 'category_product.category_id', '=', 'categories.id')
                    ->join('products', 'category_product.product_id', '=', 'products.id')
                    ->where('categories.parent_id','=','1')
                    ->select('category_product.*', 'categories.name as category','categories.slug as categoryslug', 'products.*')
                    ->orderBy("updated_at")
                    ->paginate(50);
            }else {
                $category = $this->categoryRepo->findCategoryBySlug(['slug' => "$categ"]);
                $cat = new CategoryRepository($category);
               $productis= $cat->findProducts();
            }
        }else{
            $cat=[];
        }
      



        return view('front.products.product-search', [
            'products' => $products,'search_products'=>$search_products,
        ]);
    }

    /**
     * Get the product
     *
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(string $slug)
    {    
        

   
        $product = $this->productRepo->findProductBySlug(['slug' => $slug]);
        $images = $product->images()->get();
        $category = $product->categories()->first();
        $productAttributes = $product->attributes;
     $qty = $productAttributes->map(function ($item) {
            return $item->quantity;
        })->sum();

        $product_atributes = DB::table('attribute_value_product_attribute')
            ->leftjoin('attribute_values', 'attribute_values.id', '=', 'attribute_value_product_attribute.attribute_value_id')
            ->leftjoin('product_attributes', 'product_attributes.id', '=', 'attribute_value_product_attribute.product_attribute_id')
            ->leftjoin('products', 'products.id','=','product_attributes.product_id')
            ->where('products.slug', $slug)
            ->select('product_attributes.*','attribute_values.*')
            ->orderBy('updated_at', 'desc');
            


        return view('front.products.product', compact(
            'product',
            'images',
            'productAttributes',
            'category',
            'combos',
             'qty',
            'product_atributes'
        ) );
    }
}
