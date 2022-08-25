<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function index(){
        // Pass to view
        return view('login');
      }
      public function registration(){
        // Pass to view
        return view('register');
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
    // public function welcome()
    // {
 
    //   if(Auth::check()){
    //     return view('welcome');
    //   }
    //    return Redirect::to("login")->withSuccess('Opps! You do not have access');
    // }

    public function postRegistration(Request $request)
    {  
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // request()->validate([
        // 'name' => 'required',
        // 'email' => 'required|email|unique:users',
        // 'password' => 'required|min:6',
        // ]);
         
        $data = $request->all();
 
        $check = $this->create($data);
       
        return Redirect::to("welcome")->withSuccess('Great! You have Successfully loggedin');
    }
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    public function logout() {
      Auth::logout();

      return redirect('login');
    }

}
