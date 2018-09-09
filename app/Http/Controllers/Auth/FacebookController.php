<?php


namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;
use App\Shop\Customers\Customer;
use Socialite;
use Exception;
use Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class FacebookController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        $auth_user = Socialite::driver('facebook')->user();

        $user = Customer::updateOrCreate(
            [
                'email' => $auth_user->email
            ],
            [
                'token' => $auth_user->token,
                'password'=>'nopassword',
                'facebook_id'=>$auth_user->id,
                'name'  =>  $auth_user->name
            ]
        );

        Auth::login($user, true);
        return redirect()->to('/');


    }
}