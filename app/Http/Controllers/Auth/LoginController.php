<?php

namespace newhopecrm\Http\Controllers\Auth;

use newhopecrm\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function doLogin() {

        if (request()->ajax()) {
       
            if(Auth::attempt(['email' => request()->email, 'password' => request()->password])){
                
                \Log::info('Login Successful');
                $response = ['success' => true, 'user_name' => Auth::user()->name];

               //return a JSON response
               return response()->json($response);

            } else {

               return response(['messaje' => 'Please, Make sure your email or password are correct'], 401)
                      ->header('Content-Type' ,'application/json');
           }
        } else {
            if (Auth::attempt(['email' => request()->email, 'password' => request()->password])) {

                return redirect()->intended('/');
            }
        }
    }
}
