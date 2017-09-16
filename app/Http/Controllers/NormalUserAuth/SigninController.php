<?php

namespace App\Http\Controllers\NormalUserAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class SigninController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Signin Controller
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
        $this->middleware('guest')->except('signout');
    }

    /**
     * Show the application's signin form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSigninForm()
    {
        return view('auth.signin');
    }

    /**
     * Handle a signin request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function signin(Request $request)
    {
        $this->validateLogin($request);
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the signin attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        if ($this->attemptLogin($request)) {
            if ($this->guard()->user()->isNormal()) {
                return $this->sendLoginResponse($request);
            } else {
                $this->guard()->logout();
            }
        }
        // If the signin attempt was unsuccessful we will increment the number of attempts
        // to signin and redirect the user back to the signin form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function signout(Request $request)
    {
        $this->guard()->logout();
        // $request->session()->invalidate();
        return redirect('/signin');
    }
}
