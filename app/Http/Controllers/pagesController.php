<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function League\Flysystem\delete;

class pagesController extends Controller
{
    public function componentAlert(){


        $name = 'Juma';

        return view('pages.componentAlerts')->with('name',$name);
    }


    public function Login(){
        return view('auth.login');
    }

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
    public function gotoCategories(){

        //query builder to create a relationship for users and categories
//        $categories = DB::table('categories')
//            ->join('users','categories.user_id','users.id')
//            ->select('categories.*','users.name')
//            ->latest()->get();



        //to get latest data first
        $categories = Categories::latest()->get();
        $trashCategory = Categories::onlyTrashed()->latest()->get();
        //if needed to keep in pages
//        $categories = DB::table('categories')->latest()->paginate(5);
        return view('pages.categories',compact('categories','trashCategory'));
    }

    public function addCategory(Request $request){


        //here we validate the data
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255'
        ]);


        //below shows the eloquent orm ways to add data

//        Categories::insert(
//            [
//                'category_name'=>$request->category_name,
//                'user_id'=> Auth::user()->id,
//                'created_at' => Carbon::now()
//            ]
//        );

        //this below automatically provides the created at and updated at dates
        $category = new Categories();
        $category->category_name = $request->category_name;
        $category->user_id =Auth::user()->id;
        $category->save();



        //below uses the query builder method
//        $adding = array();
//        $adding['category_name']= $request->category_name;
//        $adding['user_id']= Auth::user()->id;
//        DB::table('categories')->insert($adding);


//        return view('pages.categories',compact('categories')).with('success','Category has been added Successfully');
        return Redirect()->back()->with('success','Category has been added Successfully');

    }



    public function editCategory($id){
//by using orm
//        $categories = Categories::find($id);

        //by using query builder
        $categories = DB::table('categories')->where('id',$id)->first();
        return view('pages.editCategory',compact('categories'));
    }

    public function updateCategory(Request $request,$id){


        //here we validate the data
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255'
        ]);



        //by using orm
//        Categories::find($id)->update(
//            [
//                'category_name'=>$request->category_name,
//                'user_id'=> Auth::user()->id,
//                'updated_at' => Carbon::now()
//            ]
//        );

        //by using query builder

         DB::table('categories')->where('id',$id)->update(
            [
                'category_name'=>$request->category_name,
                'user_id'=> Auth::user()->id,
                'updated_at' => Carbon::now()
            ]
        );


        return Redirect()->route('categories')->with('success','Category has been Updated  Successfully');

    }

    public function softDelete($id){
        $delete = Categories::find($id)->delete();

        return Redirect()->back()->with('success','Category has successfully been added to trash');
    }
}
