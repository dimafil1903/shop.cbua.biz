<?php

namespace App\Http\Controllers\Front;

use App\Mail\sendEmailNotificationToAdminMailable;
use App\Mail\SendOrderToCustomerMailable;
use App\Shop\Addresses\Repositories\Interfaces\AddressRepositoryInterface;
use App\Shop\Cart\Requests\CartCheckoutRequest;
use App\Shop\Carts\Repositories\Interfaces\CartRepositoryInterface;
use App\Shop\Carts\Requests\PayPalCheckoutExecutionRequest;
use App\Shop\Carts\Requests\StripeExecutionRequest;
use App\Shop\Couriers\Repositories\Interfaces\CourierRepositoryInterface;
use App\Shop\Customers\Repositories\CustomerRepository;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Shop\Employees\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Shop\OrderDetails\Repositories\Interfaces\OrderProductRepositoryInterface;
use App\Shop\Orders\Repositories\Interfaces\OrderRepositoryInterface;
use App\Shop\PaymentMethods\Paypal\Exceptions\PaypalRequestError;
use App\Shop\PaymentMethods\Paypal\Repositories\PayPalExpressCheckoutRepository;
use App\Shop\PaymentMethods\Stripe\Exceptions\StripeChargingErrorException;
use App\Shop\PaymentMethods\Stripe\StripeRepository;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Shop\Products\Transformations\ProductTransformable;
use Exception;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PayPal\Exception\PayPalConnectionException;
use App\Shop\Checkout\CheckoutRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Shop\Customers\Customer;
use App\Shop\Employees\Employee;
use App\Shop\Customers\Requests\CreateCustomerRequest;
use App\Shop\Customers\Requests\RegisterCustomerRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Mail\UserRegistered;
class CheckoutController extends Controller
{
    use ProductTransformable;

    private $cartRepo;
    private $courierRepo;
    private $addressRepo;
    private $customerRepo;
    private $productRepo;
    private $orderRepo;
    private $courierId;
    private $orderProductRepo;
    private $payPal;

    public function __construct(
        CartRepositoryInterface $cartRepository,
        CourierRepositoryInterface $courierRepository,
        AddressRepositoryInterface $addressRepository,
        CustomerRepositoryInterface $customerRepository,
         EmployeeRepositoryInterface $employeeRepository,
        ProductRepositoryInterface $productRepository,
        OrderRepositoryInterface $orderRepository,
        OrderProductRepositoryInterface $orderProductRepository
    ) {
        $this->cartRepo = $cartRepository;
        $this->courierRepo = $courierRepository;
        $this->addressRepo = $addressRepository;
        $this->customerRepo = $customerRepository;
        $this->productRepo = $productRepository;
        $this->orderRepo = $orderRepository;
        $this->employeeRepo = $employeeRepository;
        $this->orderProductRepo = $orderProductRepository;

        $payPalRepo = new PayPalExpressCheckoutRepository();
        $this->payPal = $payPalRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = $this->customerRepo->findCustomerById($this->loggedUser()->id);

        $this->courierId = request()->session()->get('courierId', 1);




        // Get payees





        return view('front.checkout', [
            'customer' => $customer,

            'products' => $this->cartRepo->getCartItems(),
            'subtotal' => $this->cartRepo->getSubTotal(),

            'cartItems' => $this->cartRepo->getCartItemsTransformed(),

        ]);
    }

    /**
     * Checkout the items
     *
     * @param CartCheckoutRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @codeCoverageIgnore


    /**
     * Execute the PayPal payment
     *
     * @param PayPalCheckoutExecutionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */


    /**
     * @param StripeExecutionRequest $request
     * @return \Stripe\Charge


    /**
     * Cancel page
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cancel(Request $request)
    {
        return view('front.checkout-cancel', ['data' => $request->all()]);
    }

    /**
     * Success page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function success(Request $request)
    {

        $customer = $this->customerRepo->findCustomerById($this->loggedUser()->id);
        $employee = $this->employeeRepo->findEmployeeById(4);

        $checkoutRepo = new CheckoutRepository;
        $checkoutRepo->buildCheckoutItems([


            'customer_id' => auth()->user()->id,
            'name_user'=>$request->get('name_user'),
            'last_name_user'=>$request->get('last_name'),
            'city'=>$request->get('city'),
            'phone'=>$request->get('phone'),
            'order_status_id' => 4,
            'courier_id' =>  $request->get('courier_id'),
            'discounts' => 0,
            'total_products' => $request->get('allqty'),
            'total' => $request->get('pretotal'),
            'number_nova_poshta' => $request->get('number_nova_poshta') ,
            'index_city' => $request->get('index') ,

        ]);
        Mail::to($customer)->send(new SendOrderToCustomerMailable( $checkoutRepo->selectCheckoutItems(auth()->user()->id)));
        Mail::to($employee)->send(new sendEmailNotificationToAdminMailable( $checkoutRepo->selectCheckoutItems(auth()->user()->id)));

        $this->cartRepo->clearCart();
        $request->session()->flash('message', 'Ваш заказ успішно оформлено!');
        return redirect()->route('home');

    }
}
