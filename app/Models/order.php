<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function orderDetails()
    {
        return $this->hasMany(orderdatail::class, 'order_id');
    }
    use HasFactory;
}
