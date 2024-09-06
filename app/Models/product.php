<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{

    public function cart(){
 return $this->hasMany(Cart::class);
    }

    public function varieties () {
        return $this->belongsTo(varieties::class ,'category_id');
    }
    public function addproductimg () {
        return $this->hasMany(addProductimg::class );
    }
    use HasFactory;
}
