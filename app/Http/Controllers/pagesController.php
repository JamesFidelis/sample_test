<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function componentAlert(){


        $name = 'Juma';

        return view('pages.componentAlerts')->with('name',$name);
    }


    public function Login(){
        return view('pages.login');
    }

    public function Register(){
        return view('pages.register');
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
}
