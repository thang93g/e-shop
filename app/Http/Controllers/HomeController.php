<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHome()
    {
        return view('front-end.home');
    }

    public function showShop()
    {
        $categories = Category::all();
        $products = Product::all();
        $images = Image::all();
        return view('front-end.shop',compact(['categories','products','images']));
    }
}
