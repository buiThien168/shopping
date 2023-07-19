<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $guarded = [];
    protected $fillable = ['name', 'price', 'feature_image_path','content','user_id','category_id'];
}