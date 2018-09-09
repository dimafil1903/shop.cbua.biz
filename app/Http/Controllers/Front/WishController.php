<?php

namespace App\Http\Controllers\Front;

use App\Shop\Wish\Requests\AddToCartRequest;
use App\Shop\Wish\Repositories\Interfaces\WishRepositoryInterface;
use App\Shop\Couriers\Repositories\Interfaces\CourierRepositoryInterface;
use App\Shop\ProductAttributes\Repositories\ProductAttributeRepositoryInterface;
use App\Shop\Products\Product;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Shop\Products\Repositories\ProductRepository;
use App\Shop\Products\Transformations\ProductTransformable;
use Gloudemans\Shoppingcart\CartItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Bhavinjr\Wishlist\Facades\Wishlist;
use App\Shop\Customers\Customer;
use Illuminate\Support\Facades\DB;
class WishController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $cartItems= Wishlist::getUserWishlist(auth()->user()->id);

        $products = DB::table('wishlists')
            ->join('customers', 'wishlists.user_id', '=', 'customers.id')
            ->join('products', 'wishlists.product_id', '=', 'products.id')
            ->where('wishlists.user_id','=',auth()->user()->id)
            ->select('products.*')
            ->orderBy("updated_at",'desc')
            ->get();
        return view('front.carts.wish', [
            'cartItems'=>$products
        ]);
    }
    public function  add(Request $request){
        $product = $request->input('product');

        Wishlist::add($product, auth()->user()->id);
        $request->session()->flash('message', 'Товар було додано успішно');
        return redirect()->route('wish');
}
    public function  delete(Request $request){
        $product = $request->input('delete');

        Wishlist::removeByProduct($product, auth()->user()->id);
        request()->session()->flash('message', 'Видалення товару було успішним');
        return redirect()->route('wish');
    }
}