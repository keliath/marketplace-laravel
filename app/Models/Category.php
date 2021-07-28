<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function ads()
    {
        return $this->hasMany(Advertisement::class);
    }

    //scope
    public function scopeCategoryCar($query)
    {
        return $query->where('name', 'carss')->first();
    }
}
