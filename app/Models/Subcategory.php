<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Childcategory;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'category_id'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function childcategories(){
        return $this->hasMany(Childcategory::class);
    }

}
