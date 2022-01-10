<?php

namespace App\Http\Controllers\College\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
   /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = "/college/dashboard";

    public function __construct()
    {
        $this->middleware('guest:college')->except('logout');
    }

    public function showLoginForm()
    {
        return view('college.auth.login');
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard('college')->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    public function logout(Request $request)
    {
        $this->guard('college')->logout();
        return redirect()->route('college.login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('college');
    }

}
