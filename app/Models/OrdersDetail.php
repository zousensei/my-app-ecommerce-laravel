<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersDetail extends Model
{
    use HasFactory;
    protected $table = 'tb_orders_detail';
    protected $primaryKey = 'id_order_detail';
    protected $fillable = [
        'code_orders',
        'price_total',

    ];
    
}
