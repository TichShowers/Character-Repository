<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class AuthController extends Controller {

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;

        $this->middleware('guest', ['except' => 'logout']);
    }

	public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'username' => 'required', 'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember')))
        {
            //return redirect()->intended($this->redirectPath());
            return 'Login successful';
        }

        return view('auth.login')
            ->withInput($request->only('username', 'remember'))
            ->withErrors([
                'username' => 'Username or password are incorrect',
            ]);
    }

    public function logout()
    {
        $this->auth->logout();

        return route('Home');
    }

}
