<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public static function getjobData($id=0){

        if($id==0){
          $value=DB::table('jobs')->orderBy('id', 'asc')->get(); 
        }else{
          $value=DB::table('jobs')->where('id', $id)->first();
        }
        return $value;
      }

      public static function getjobDataById($id){
        $value=DB::table('jobs')->where('id', $id)->first();
        return $value;
      }
    
      public static function insertData($data){
        $value=DB::table('jobs')->where('company', $data['company'])->get();
        if($value->count() == 0){
          DB::table('jobs')->insert($data);
          return 1;
         }else{
           return 0;
         }
     
      }
    
      public static function updateData($id,$data){
        DB::table('jobs')
          ->where('id', $id)
          ->update($data);
      }
    
      public static function deleteData($id){
        DB::table('jobs')->where('id', '=', $id)->delete();
      }
}