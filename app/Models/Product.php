<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    // protected $guarded = [];
    use SoftDeletes;
    protected $fillable = ['name', 'price', 'feature_image_path', 'content', 'user_id', 'category_id'];
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    // tạo mối quan hệ
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id')->withTimestamps();
    }
    //
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    public function orders()
    {
        return $this->hasOne(order_items::class, 'product_id');
    }
}
