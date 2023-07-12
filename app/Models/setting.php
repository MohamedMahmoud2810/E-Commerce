<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'description', 'address', 'phone', 'email', 'logo', 'favicon', 'facebook', 'twitter', 'instagram', 'youtube', 'tiktok'];
    protected $table = 'settings';
}
