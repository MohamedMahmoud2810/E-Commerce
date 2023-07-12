<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $fillable = [ 'id', 'product_color_size_id', 'image'];
    protected $table = 'product_image';

    public function productColorSize(){
        return $this->belongsTo(productColorSize::class);
    }
}
