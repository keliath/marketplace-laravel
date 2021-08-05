<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fraud extends Model
{
    use HasFactory;
    protected $fillable=['reason','message','ad_id','email'];

    public function fraudad()
    {
        return $this->belongsTo(Advertisement::class,'ad_id','id');
        // si las llave foranea tiene disinto nombre a "nombreTabla-id" se tendra que especificar
    }
}
