<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use App\Models\Category;

class MenuController extends Controller
{
    public function menu()
    {
        // $menus = category::with('subcategories')->get();

        // $category = Category::where('name', 'car')->first();

        // $firstAds = Advertisement::where('category_id', $category->id)->oderBy('id', 'desc')->take(4)->get();
        // $secondAds = Advertisement::where('category_id', $category->id)->whereNotIn('id', $firstAds->pluck('id')->toArray())->take(4)->get(); //skip instead whereNotIn?

        // $ads = Advertisement::where('category_id', $category->id)->latest()->take(4)->get(); //orderBy('id','desc') alternative to latest

        // return view('index');
    }
}
