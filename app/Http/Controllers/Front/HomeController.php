<?php

namespace App\Http\Controllers\Front;
Use Illuminate\Support\Facades\DB;
use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Shop\Products\Transformations\ProductTransformable;
use App\Shop\Products\Product;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
class HomeController extends Controller
{
    use ProductTransformable;

    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepo;
    private $productRepo;

    /**
     * HomeController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     * * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
      ProductRepositoryInterface $productRepository)
    {
        $this->categoryRepo = $categoryRepository;
        $this->productRepo = $productRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {


        $categories = $this->categoryRepo->listCategories('created_at', 'asc')->where('parent_id', 1);
        $products = DB::table('category_product')
            ->join('categories', 'category_product.category_id', '=', 'categories.id')
            ->join('products', 'category_product.product_id', '=', 'products.id')
            ->where('categories.parent_id','=',1)
            ->where('products.front_status','=','recommended')
            ->where('products.quantity','>','0')
            ->select('category_product.*', 'categories.name as category','categories.slug as categoryslug', 'products.*')
            ->take('20')
            ->orderBy("updated_at",'desc')
            ->get();
        $products_action = DB::table('category_product')

            ->join('products', 'category_product.product_id', '=', 'products.id')
            ->join('categories', 'category_product.category_id', '=', 'categories.id')
            ->where('products.front_status','=','action')
            ->where('categories.parent_id','=',1)
            ->select('products.*')
            ->take('5')
            ->orderBy("updated_at",'desc')
            ->get();

        return view('front.index', compact('categories','products','products_action'));
    }
}
