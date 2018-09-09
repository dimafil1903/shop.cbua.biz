<?php
/**
 * Created by PhpStorm.
 * User: dima
 * Date: 07.07.2018
 * Time: 20:53
 */

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductsController
{
    public function bu_show()
    {
       
        if(request()->has('show') && request()->input('show') != ''    && request()->has('order_by') && request()->input('order_by') == 'price_asc'||request()->input('order_by') == 'price_desc'||request()->input('order_by') == 'name'||request()->input('order_by') == 'updated_at'||request()->input('order_by') == 'price_asc'){

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

            $products = DB::table('category_product')
                ->leftjoin('products', 'products.id', '=', 'category_product.product_id')
                ->leftjoin('categories', 'categories.id', '=', 'category_product.category_id')
                ->where('categories.parent_id','=',1)
                ->where('products.front_status','=','bu')

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
                ->where('categories.parent_id','=',1)
                ->where('products.front_status','=','bu')
                ->select('products.*')
                ->orderBy('updated_at', 'desc')
                ->paginate(10);

        }

        $atributes_sort=DB::table('products')->select('products.updated_at','products.name','products.price');



        return view('front.products.bu_products', [
            'show'=>$show,
            'atributes_sort'=>  $atributes_sort,
            'sort_by'=>$sort_by,

            'products' => $products,



        ]);
    }
    public function action_show()
    {

        if(request()->has('show') && request()->input('show') != ''    && request()->has('order_by') && request()->input('order_by') == 'price_asc'||request()->input('order_by') == 'price_desc'||request()->input('order_by') == 'name'||request()->input('order_by') == 'updated_at'||request()->input('order_by') == 'price_asc'){

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

            $products = DB::table('category_product')
                ->leftjoin('products', 'products.id', '=', 'category_product.product_id')
                ->leftjoin('categories', 'categories.id', '=', 'category_product.category_id')
                ->where('categories.parent_id','=',1)
                ->where('products.front_status','=','action')

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
                ->where('categories.parent_id','=',1)
                ->where('products.discount','>','0')
                ->select('products.*')
                ->orderBy('updated_at', 'desc')
                ->paginate(10);

        }

        $atributes_sort=DB::table('products')->select('products.updated_at','products.name','products.price');



        return view('front.products.action_products', [
            'show'=>$show,
            'atributes_sort'=>  $atributes_sort,
            'sort_by'=>$sort_by,

            'products' => $products,



        ]);
    }
}