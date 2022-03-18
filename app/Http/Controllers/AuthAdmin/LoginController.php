<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function username()
    {
        return 'email';
    }

    protected function validateLogin(Request $request)
    {
        
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
    }

    public function showLoginForm(){
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if ( Auth::guard('admin')->attempt($credential, $request->member ) )  {
            auth()->guard('web')->logout();
            return redirect()->intended(route('admin.home'));
        }

        return redirect()->back()->withInput( $request->only('email', 'remember') );
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }

}
