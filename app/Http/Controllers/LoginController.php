<?php

// use Session;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;

class LoginController extends Controller
{
    public function index($id=0){
 
        // Fetch all records
        $userData['data'] = Login::getuserData();
     
        $userData['edit'] = $id;
    
        // Fetch edit record
        if($id>0){
          $userData['editData'] = Login::getuserData($id);
        }
    
        // Pass to view
        return view('home')->with("userData",$userData);
      }
    
      public function save(Request $request){
     
        if ($request->input('submit') != null ){
    
          // Update record
          if($request->input('editid') !=null ){
            $email = $request->input('email');
            $editid = $request->input('editid');
    
            if($email != ''){
               $data = array("email"=>$email);
     
               // Update
               Login::updateData($editid, $data);
    
               Session::flash('message','Update successfull.');
     
            }
     
          }else{ // Insert record
             $email = $request->input('email');
             $password = $request->input('password');
    
             if($email != '' && $password != ''){
                $data = array("email"=>$email,"password"=>$password);
     
                // Insert
                $value = Login::insertData($data);
                if($value){
                  Session::flash('message','Insert successfully.');
                }else{
                  Session::flash('message','Insert Failed');
                }
     
             }
          }
     
        }
        return redirect()->action('LoginController@index',['id'=>0]);
      }
    
      public function deleteUser($id=0){
    
        if($id != 0){
          // Delete
          Login::deleteData($id);
    
          Session::flash('message','Delete successfully.');
          
        }
        return redirect()->action('LoginController@index',['id'=>0]);
      }
}
