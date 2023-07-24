<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use function League\Flysystem\delete;

class pagesController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');

    }


    public function componentAlert(){


        $name = 'Juma';

        return view('pages.componentAlerts')->with('name',$name);
    }


//    public function Login(){
//        return route('user.login');
//    }

    public function Register(){
        return view('auth.register');
    }

    public function gotoProfile(){
        return view('pages.profile');
    }
    public function notFound(){
        return view('pages.errorpage');
    }
    public function gotoFAQ(){
        return view('pages.faq');
    }
    public function gotoContact(){
        return view('pages.contact');
    }
    public function gotoUsers(){
        $users = User::latest()->get();
        return view('pages.users',compact('users'));
    }

//custom Dashboard code
    public function Logout(){
        Auth::logout();
        return Redirect()->route('login')->with('success','Logout Successfull');
    }
    public function gotoLogin(){
        return view('pages.login');
    }






}
