<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class MailController extends Controller
{
    public function mailsend(Request $request) {
        $data = $request->all();
        $email = Auth::user()->email;
        $name = Auth::user()->name;
        $job = $data['job'];

        Mail::send('mail', $data, function($message) use ($email,$name,$job) {
           $message->to($job, 'Job')->subject
              ('Job Application');
           $message->from($email,$name);
        });
        Mail::send('mailclient', $data, function($message) use ($email,$name,$job) {
            $message->to($email, $name)->subject
               ('Job Application Sent');
            $message->from('recrouter@gmail.com','RecRouter');
         });

        return redirect()->back()->with('message', 'Application Sent Successfully.');
     }
}
