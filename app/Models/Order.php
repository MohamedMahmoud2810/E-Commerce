<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [ 'id', 'user_id', 'status', 'payment_method', 'payment_status', 'payment_id', 'totlal_price', 'address', 'phone', 'email', 'name', 'surname', 'city', 'potal_code', 'country', 'shipping_price'];
    protected $table = 'orders';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);

    }
}
