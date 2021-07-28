<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Category;

class FrontendAdsController extends Controller
{
    public function index()
    {
        // $category = Category::CategoryCar();
        // $firstCarousel = Advertisement::firstCarouselPreview($category->id);
        // $secondCarousel = Advertisement::secondCarouselPreview($category->id);

        return view('index');
    }
}
