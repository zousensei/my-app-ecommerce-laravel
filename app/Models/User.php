<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tb_customers';
    protected $primaryKey = 'customer_id';
    protected $fillable = [
        'customer_username',
        'customer_name',
        'customer_lname',
        'customer_img',
        'customer_email',
        'customer_password',
        'customer_gender',
        'customer_birthday',
        'customer_phone',
    ];

    protected $hidden = [
        'customer_password',
        'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->customer_password;
    }
}
