<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Mail\SendMailable;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Role::create(['name' => 'writer']);
        $permission = Permission::create(['name' => 'edit articles']);

        return view('home');
    }
    public function mail()
    {
        $first_name = 'shilpi';
        $last_name =  'trivedi';
        $image     =   'img_5terre_wide.jpg';
        Mail::to('shilpi.trivedi@brainvire.com')->send(new SendMailable($first_name,$last_name,$image));

        return 'Email was sent';
        return view('student');
    }

}



