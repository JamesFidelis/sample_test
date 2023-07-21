<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function gotoBrand(){
        $brands = Brand::latest()->get();
        return view('pages.brand',compact('brands'));
    }
}
