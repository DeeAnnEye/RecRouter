<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function updateNameById(Request $request)
    {
        $data = $request->all();
        $name = $data['name'];
        $id = Auth::user()->id;
        DB::table('users')->where('id', $id)->update(['name' => $name]);
        return redirect()->back()->with('message', 'Name Updated Successfully.');
    }
}
