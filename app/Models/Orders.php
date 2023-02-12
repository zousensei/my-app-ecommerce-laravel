<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'tb_orders';
    protected $primaryKey = 'id_order';
    protected $fillable = [
        'code_orders',
        'amount',
        'transport',
        'transport_price',
        'created_at',
    ];
}
