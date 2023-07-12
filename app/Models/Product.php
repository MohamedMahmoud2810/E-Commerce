<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [  'id', 'name', 'image', 'description', 'price', 'discount_price', 'category_id'];
    protected $table = 'products';

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function productColorSize(){
        return $this->hasMany(productColorSize::class , 'product_id');
    }

    public function productColor(){
        return $this->hasMany(ProductColor::class , 'product_id');
    }

    public function productSize(){
        return $this->hasMany(ProductSize::class , 'product_id');
    }

}
