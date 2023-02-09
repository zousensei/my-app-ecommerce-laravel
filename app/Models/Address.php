<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'tb_customer_addresss';
    protected $primaryKey = 'customer_address_id';
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_address',
        'customer_tumbon',
        'customer_district',
        'customer_province',
        'customer_postcode',
        'address_status',
    ];
}
