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
        DB::table('jobs')->insert($data);
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