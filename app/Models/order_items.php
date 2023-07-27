<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class order_items extends Model
{
    protected $guarded = [];
    public function products()
    {
        return $this->hasMany(Product::class, 'user_id');
    }
}
