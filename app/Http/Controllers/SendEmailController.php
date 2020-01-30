<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;use Illuminate\Support\Arr;


class SendEmailController extends Controller
{
    function index()
    {
//        print_r("hii");
//        die();
        $data = ['$idAddress' => $_SERVER['SERVER_NAME'],'$browser' => $_SERVER['HTTP_USER_AGENT'],'$username' => ['$request->name'],'$password' =>['$request->passowrd']];
//        print_r($data);
//        die();
      $email =['formEmail'=>"crazydev82@gmail.com",
               'to'=>'shilpi.trivedi@brainvire.com',
              'subject'=>'message'];
//        $email = [
//            "name" => "John",
//        ];
//        print_r($email['data']);
//        die();
        Mail::send('email.EmailTemplate', $data, function ($message) use ($email){
//            print_r($email);
//            die();
            $message->from($email->fromEmail, 'Conformation Mail');

            $message->to($email->to);
            $message->subject($email->subject);
        });
    }
    function send(Request $request)
    {
        $this->validate($request, [
            'name'     =>  'required',
            'email'  =>  'required|email',
            'message' =>  'required'
        ]);

        $data = array(
            'name'      =>  $request->name,
            'message'   =>   $request->message
        );
        return back('EmailTemplate')->with('success', 'Thanks for contacting us!');

    }
}
