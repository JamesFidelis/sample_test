<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Pictures;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');

    }

    public function gotoBrand(){
        $brands = Brand::latest()->get();
        return view('pages.brand',compact('brands'));
    }

    public function addBrand(Request $request){

        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|min:2',
            'brand_image' => 'required|mimes:jpg.jpeg,png',
        ],[
                'brand_name.min' => 'Brand name must contain at least 2 characters',
            ]
        );

      $brand_image = $request->file('brand_image');

        //TODO: USING ELOQUENT ORM

//      $unique_name = hexdec(uniqid());
//      $extension = strtolower($brand_image->getClientOriginalExtension());
//      $new_name = $unique_name.'.'.$extension;
//      $upload_location = 'images/brands/';
//      $final_name= $upload_location.$new_name;
//      $brand_image->move($upload_location,$new_name);

      //TODO: USING INTERVENTION PACKAGE

        $upload_location = 'images/brands/';
        $unique_name = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(100,200)->save($upload_location.$unique_name);

        $final_name= $upload_location.$unique_name;


      Brand::insert([
          'brand_name'=> $request->brand_name,
          'brand_image'=> $final_name,
          'created_at'=> Carbon::now()
      ]);


//      $notification = array(
//          'message'=>'Brand Uploaded Successfully',
//          'alert-type'=>'success'
//      );


      return Redirect()->back()->with('success','Brand Uploaded Successfully');
//      return Redirect()->back()->with($notification);
    }


    public function editBrand($id){

        $brand = Brand::find($id);

        return view('pages.editBrand',compact('brand'));

    }

    public function updateBrand(Request $request,$id){

        $validated = $request->validate([
            'brand_name' => 'required|min:2'
        ],[
                'brand_name.min' => 'Brand name must contain at least 2 characters',
            ]
        );
        $brand_image = $request->file('brand_image');

        $old_image = $request->old_image;


        if($brand_image){
            $unique_name = hexdec(uniqid());
            $extension = strtolower($brand_image->getClientOriginalExtension());
            $new_name = $unique_name.'.'.$extension;
            $upload_location = 'images/brands/';
            $final_name= $upload_location.$new_name;
            $brand_image->move($upload_location,$new_name);
            unlink($old_image);

            Brand::find($id)->update(
                [
                    'brand_name'=>$request->brand_name,
                    'brand_image'=>$final_name,
                    'updated_at' => Carbon::now()
                ]
            );

            return Redirect()->route('brand')->with('success','Brand Updated  Successfully');
        }else{
            Brand::find($id)->update(
                [
                    'brand_name'=>$request->brand_name,
                    'updated_at' => Carbon::now()
                ]
            );

            return Redirect()->route('brand')->with('success','Brand Updated  Successfully');
        }


    }

    public function permanentDelete($id){
        $image = Brand::find($id);

        $delete = Brand::find($id)->delete();
        $old_image = $image->brand_image;
        unlink($old_image);

        return Redirect()->back()->with('success','Brand Deleted Successfully');

    }


    //Multiple picture controllers

    public function gotoMultipic(){
        $pictures = Pictures::latest()->get();
        return view('pages.pictures',compact('pictures'));
    }


    public function storeImages(Request $request){

//        $validated = $request->validate([
//            'image' => 'required|mimes:jpg.jpeg,png',
//        ]
//        );

        $selectedPictures = $request->file('image');


        foreach ($selectedPictures as $multiImage){

            $upload_location = 'images/pictures/';
            $unique_name = hexdec(uniqid()).'.'.$multiImage->getClientOriginalExtension();
            Image::make($multiImage)->resize(100,200)->save($upload_location.$unique_name);
            $final_name= $upload_location.$unique_name;


//            DB::table('pictures')->insert([
//                'image'=> $final_name,
//                'created_at'=> Carbon::now()
//            ]);

            Pictures::insert([
                'image'=> $final_name,
                'created_at'=> Carbon::now()
            ]);

        }





        return Redirect()->back()->with('success','Pictures Uploaded Successfully');

    }

}
