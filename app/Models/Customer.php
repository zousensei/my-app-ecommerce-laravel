<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'tb_customers';
    protected $primaryKey = 'customer_id';
    protected $fillable = [
        'customer_name',
        'customer_lname',
        'customer_email',
        'customer_password',
        'customer_phone',
    ];
}
