<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Childcategory;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function findForCategory(Request $request, Category $categorySlug)
    {
        $priceFilter = Advertisement::where('category_id', $categorySlug->id)->when($request->minPrice, function ($query, $minPrice) {
            return $query->where('price', '>=', $minPrice);
        })->when($request->maxPrice, function ($query, $maxPrice) {
            return $query->where('price', '<=', $maxPrice);
        })->get();

        $withoutFilter = $categorySlug->ads;

        $advertisements = $request->minPrice || $request->maxPrice ? $priceFilter : $withoutFilter;

        // $filter = $categorySlug->ads->unique('subcategory_id');
        $filter = Subcategory::where('category_id', $categorySlug->id)->get(); //alternativa para obtener las sub categorias 
        
        return view('products.category', compact('advertisements', 'filter'));
    }
    public function findForSubcategory(Request $request, $categorySlug, Subcategory $subcategorySlug)
    {
        // $sub = Subcategory::where('slug', $subcategorySlug)->first();
        // $subId = $sub->id;
        // $ads = Advertisement::where('subcategory_id', $subId)->get();
        // return view('products.subcategory', compact('ads')); //alternativa a usar routerkeyname

        $priceFilter = Advertisement::where('subcategory_id', $subcategorySlug->id)->when($request->minPrice, function ($query, $minPrice) {
            return $query->where('price', '>=', $minPrice);
        })->when($request->maxPrice, function ($query, $maxPrice) {
            return $query->where('price', '<=', $maxPrice);
        })->get();

        $withoutFilter = $subcategorySlug->ads;

        $advertisements = $request->minPrice || $request->maxPrice ? $priceFilter : $withoutFilter;

        $filter = $subcategorySlug->ads->unique('childcategory_id');
        return view('products.subcategory', compact('advertisements', 'filter'));
    }
    public function findForChildcategory(Request $request, $categorySlug, Subcategory $subcategorySlug, Childcategory $childcategorySlug)
    {
        $priceFilter = Advertisement::where('childcategory_id', $childcategorySlug->id)->when($request->minPrice, function ($query, $minPrice) {
            return $query->where('price', '>=', $minPrice);
        })->when($request->maxPrice, function ($query, $maxPrice) {
            return $query->where('price', '<=', $maxPrice);
        })->get();

        $withoutFilter = $childcategorySlug->ads;

        $advertisements = $request->minPrice || $request->maxPrice ? $priceFilter : $withoutFilter;

        $filter = $subcategorySlug->ads->unique('childcategory_id'); // unique para compactar y no se repitan en base al atributo dado
        return view('products.childcategory', compact('advertisements', 'filter'));
    }
    public function productDetail($id, $slug)
    {
        $advertisement = Advertisement::where('id', $id)->where('slug', $slug)->first();
        return view('products.details', compact('advertisement'));
    }
}
