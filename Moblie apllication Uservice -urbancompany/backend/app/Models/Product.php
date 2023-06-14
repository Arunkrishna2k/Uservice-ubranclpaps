<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['id','product', 'photo', 'price', 'category', 'sub_category', 'remarks', 'status', 'created_by', 'updated_by'];

}
