<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    public function index(){
        // Pass to view
        return view('login');
      }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('welcome');
        }

        return redirect('login')->with('error', 'Opps! You have entered invalid credentials');
    }
    public function welcome()
    {
 
      if(Auth::check()){
        return view('welcome');
      }
       return Redirect::to("login")->withSuccess('Opps! You do not have access');
    }

    public function logout() {
      Auth::logout();

      return redirect('login');
    }

}
