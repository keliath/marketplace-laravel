<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Advertisement extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subcategory()
    {
        return $this->hasOne(subcategory::class, 'id', 'subcategory_id');
    }

    public function childcategory()
    {
        return $this->hasOne(Childcategory::class, 'id', 'childcategory_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //save ads favorite
    public function userAds()
    {
        return $this->belongsToMany(User::class);
    }

    //check same user post
    // public function didUserSavedAd()
    // {
    //     return DB::table('advertisements')->where('user_id', auth()->user()->id)->where('id',$this->id)->first();
    // } //user id its already in advertisement table

    ///scope
    public function scopeFirstCarouselPreview($query, $categoryId)
    {
        return $query->where('category_id', $categoryId)->orderBy('id', 'desc')->take(4)->get();
    }
    public function scopeSecondCarouselPreview($query, $categoryId)
    {
        $firstAds = $this->scopeFirstCarouselPreview($query, $categoryId);
        return $query->where('category_id', $categoryId)->whereNotIn('id', $firstAds->pluck('id')->toArray())->take(4)->get();
    }
}
