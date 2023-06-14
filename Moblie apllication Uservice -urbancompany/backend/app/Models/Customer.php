<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['id','phone_number', 'register_number', 'customer_name', 'email', 'register_type', 'mci_number','remarks', 'status', 'created_by', 'updated_by'];
}
