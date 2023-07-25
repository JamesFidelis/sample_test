<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class pagesController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');

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
        return view('home');
    }

    public function updatePassword(Request $request){
        $validateData = $request->validate([
            'current_password'=> 'required',
            'password'=> 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->current_password,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();


            return redirect()->route('login')->with('success','Password changed Successfully');
        }else{
            return redirect()->back()->with('error','Password Change Failed');
        }


    }

    public function profileUpdate(Request $request){
        $validateData = $request->validate([
            'name'=>'required',
            'email'=>'required'
        ]);

        $user = User::find(Auth::user()->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'updated_at'=>Carbon::now()
        ]);
        return redirect()->back()->with('success','Profile Update Successsfull');




    }






}
