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
    public function index(){
 
        // Fetch all records
        $jobData['data'] = Job::getjobData();
    
        // Pass to view
        return view('welcome')->with("jobData",$jobData);
      }
    
      public function addJob(Request $request){

            $company = $request->input('company');
            $desg = $request->input('desg');
            $vacancy = $request->input('vacancy');
            $salary = $request->input('salary');
            $description = $request->input('desc');
            $email = $request->input('email');
            $end_date = $request->input('end_date');

            $data=array('company'=>$company,"designation"=>$desg,"vacancy"=>$vacancy,"salary"=>$salary,"description"=>$description,"email"=>$email,"end_date"=>$end_date);
            Job::insertData($data);
            $jobData['data'] = Job::getjobData();
            return view('admin')
            ->with("jobData",$jobData)
            ->with("message","Job Added.");
      }
    
      public function deleteJobById($id){
        
        DB::table('jobs')->where('id', $id)->update(['removed' => '1']);
        return redirect()->back()->with('message', 'Job Deleted.');
        
      }

      public function jobApply($id){
        $jobData = Job::getjobDataById($id);
        return view('apply')->with("jobData",$jobData);
      }

      public function getUpdateJob($id){
        $updateData = Job::getjobDataById($id);
  
        return view('update')->with("updateData",$updateData);
      }

      public function updateJob(Request $request){
        
            $id = $request->input('jobId');
            $designation = $request->input('designation');
            $vacancy = $request->input('vacancy');
            $salary = $request->input('salary');
            $description = $request->input('description');
            $email = $request->input('email');
            $end_date = $request->input('end_date');
            if($request->has('toggle'))
            {
              $active=1;
            }else{
              $active=0;
            }
             
        
        DB::table('jobs')->where('id', $id)->update([
          'designation' => $designation,
          'vacancy' => $vacancy,
          'salary' => $salary,
          'description' => $description,
          'email' => $email,
          'active' => $active,
          'end_date' => $end_date
        ]);
        return redirect()->back()->with('message', 'Job Updated.');
        
      }


      public function getJobs(){
 
        // Fetch all records
        $jobData['data'] = Job::getjobData();
     
        // Pass to view
        return view('admin')->with("jobData",$jobData);
      }

}
