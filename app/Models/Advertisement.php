<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subcategory()
    {
        return $this->hasOne(subcategory::class,'id', 'subcategory_id');
    }

    public function childcategory()
    {
        return $this->hasOne(Childcategory::class,'id', 'childcategory_id');
    }
}
