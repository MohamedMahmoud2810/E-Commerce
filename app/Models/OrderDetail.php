<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [ 'id', 'order_id', 'quantity', 'price', 'dicount' , 'product_id'];
    protected $table = 'order_details';

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function products(){
        return $this->belongsTo(Product::class , 'product_id' , 'id');
    }


}
