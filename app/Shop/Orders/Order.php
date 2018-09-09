<?php

namespace App\Shop\Orders;


use App\Shop\Customers\Customer;
use App\Shop\OrderStatuses\OrderStatus;
use App\Shop\Products\Product;
use App\Shop\Couriers\Courier;
use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Order extends Model
{
    use Eloquence;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'name_user' ,
        'last_name_user' ,
        'city'  ,
        'phone' ,
        'order_status_id',
        'courier_id',
        'discounts' ,
        'total_products' ,
        'total' ,
        'number_nova_poshta' ,
        'index_city',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function products()
    {
        return $this->belongsToMany(Product::class)
                    ->withPivot(['quantity']);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function courier()
    {
        return $this->belongsTo(Courier::class);
    }





    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }
}
