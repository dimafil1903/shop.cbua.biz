<?php

namespace App\Http\Controllers\Front;

use App\Shop\Couriers\Repositories\Interfaces\CourierRepositoryInterface;
use App\Shop\Customers\Repositories\CustomerRepository;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Shop\Orders\Order;
use App\Shop\Orders\Transformers\OrderTransformable;
Use Illuminate\Support\Facades\DB;

class AccountsController extends Controller
{
    use OrderTransformable;

    private $customerRepo;
    private $courierRepo;

    public function __construct(
        CourierRepositoryInterface $courierRepository,
        CustomerRepositoryInterface $customerRepository
    ) {
        $this->customerRepo = $customerRepository;
        $this->courierRepo = $courierRepository;
    }

    public function index()
    {
        $customer = $this->customerRepo->findCustomerById(auth()->user()->id);

        $customerRepo = new CustomerRepository($customer);
        $orders = $customerRepo->findOrders();

        $orders->transform(function (Order $order) {
            return $this->transformOrder($order);
        });

       $couriers = DB::table('couriers')

            ->select('couriers.*')

            ->get();
$products_order= DB::table('order_product')
    ->join('orders', 'order_product.order_id', '=', 'orders.id')
    ->join('products', 'order_product.product_id', '=', 'products.id')
    ->where('orders.customer_id','=',auth()->user()->id)
    ->select('products.*','order_product.quantity as qty','order_product.order_id as order_id' )
    ->orderBy("updated_at",'desc')
    ->get();
    
        return view('front.accounts', [
          
            'customer' => $customer,
            'orders' => $this->customerRepo->paginateArrayResults($orders->toArray(), 10),
            'couriers' =>$couriers,
            'products_order'=>$products_order,
        ]);
    }
}
