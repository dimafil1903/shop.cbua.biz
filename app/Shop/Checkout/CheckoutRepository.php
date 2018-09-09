<?php

namespace App\Shop\Checkout;

use App\Shop\Carts\Repositories\CartRepository;
use App\Shop\Carts\ShoppingCart;
use App\Shop\OrderDetails\OrderProduct;
use App\Shop\OrderDetails\Repositories\OrderProductRepository;
use App\Shop\Orders\Order;
use App\Shop\Orders\Repositories\OrderRepository;

class CheckoutRepository
{
    /**
     * @param array $data
     * @return Order
     */
    public function buildCheckoutItems(array $data) : Order
    {
        $orderRepo = new OrderRepository(new Order);
        $cartRepo = new CartRepository(new ShoppingCart);
        $orderProductRepo = new OrderProductRepository(new OrderProduct);

        $order = $orderRepo->create([


            'customer_id' => $data['customer_id'],
            'name_user' =>  $data['name_user'],
            'last_name_user' =>  $data['last_name_user'],
            'city' =>  $data['city'],
            'phone' =>  $data['phone'],
            'order_status_id' => $data['order_status_id'],
            'courier_id'=> $data['courier_id'],
            'discounts' => $data['discounts'],
            'total_products' => $data['total_products'],
            'total' => $data['total'],
            'number_nova_poshta' => $data['number_nova_poshta'] ,
            'index_city' => $data['index_city'],
          
        ]);

        $orderProductRepo->buildOrderDetails($order, $cartRepo->getCartItems());

        return $order;
    }
    public function selectCheckoutItems($customer_id){
        $cartRepo = new CartRepository(new ShoppingCart);
        $orderProductRepo = new OrderProductRepository(new OrderProduct);
        $orderRepo = new OrderRepository(new Order);

        $select = $orderRepo->findOneBy(['customer_id'=> $customer_id])->first();

        return $select;

    }
}
