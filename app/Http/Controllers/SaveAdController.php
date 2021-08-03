<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Advertisement;
use Illuminate\Support\Facades\DB;

class SaveAdController extends Controller
{
    public function saveAd(Request $request)
    {
        $ad = Advertisement::find($request->adId);
        $ad->userAds()->syncWithOutDetaching($request->userId);
    }

    public function getAdsFav()
    {
        $advertisementsId = DB::table('advertisement_user')
        ->where('user_id', auth()->user()->id)->pluck('advertisement_id');
        $ads = Advertisement::whereIn('id', $advertisementsId)->get();
        return view('products.saved-ads', compact('ads'));
    }
}
