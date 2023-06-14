<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['id','order_by', 'phone', 'order_product', 'date', 'price', 'payment_mode', 'address',
        'card_info', 'otp', 'otp_status', 'remarks', 'status', 'created_by', 'updated_by'];

}
