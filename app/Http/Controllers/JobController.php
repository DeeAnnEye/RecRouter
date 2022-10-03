<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class JobController extends Controller
{
    public function index($id=0){
 
        // Fetch all records
        $jobData['data'] = Job::getjobData();
     
        $jobData['edit'] = $id;
    
        // Fetch edit record
        if($id>0){
          $jobData['editData'] = Job::getjobData($id);
        }
    
        // Pass to view
        return view('welcome')->with("jobData",$jobData);
      }
    
      public function save(Request $request){
     
        if ($request->input('submit') != null ){
    
          // Update record
          if($request->input('editid') !=null ){
            $company = $request->input('company');
            $editid = $request->input('editid');
    
            if($company != ''){
               $data = array("company"=>$company);
     
               // Update
               Job::updateData($editid, $data);
    
               Session::flash('message','Update successfull.');
     
            }
     
          }else{ // Insert record
            // todo vacancy
             $designation = $request->input('designation');
             $company = $request->input('company');
             $salary = $request->input('salary');
             $description = $request->input('description');
             
    
             if($designation != '' && $company != '' && $salary){
                $data = array("designation"=>$designation,"company"=>$company,"salary"=>$salary,"description"=>$description);
     
                // Insert
                $value = Job::insertData($data);
                if($value){
                  Session::flash('message','Insert successfully.');
                }else{
                  Session::flash('message','Insert Failed');
                }
     
             }
          }
     
        }
        return redirect()->action('JobController@index',['id'=>0]);
      }
    
      public function deleteJobById($id){
        
        DB::table('jobs')->where('id', $id)->update(['removed' => '1']);
        return redirect()->back()->with('message', 'Job Deleted.');
        
      }

      public function jobApply($id){
        $jobData = Job::getjobDataById($id);
        return view('apply')->with("jobData",$jobData);
      }

      public function getJobs(){
 
        // Fetch all records
        $jobData['data'] = Job::getjobData();
     
        // Pass to view
        return view('admin')->with("jobData",$jobData);
      }
}
