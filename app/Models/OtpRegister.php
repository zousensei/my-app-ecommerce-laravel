<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtpRegister extends Model
{
    use HasFactory;
    protected $table = 'tb_otps';
    protected $primaryKey = 'otp_id';
    protected $fillable = [
        'otp_id',
        'otp_email',
        'otp_code',
        'otp_ref',
    ];
}
