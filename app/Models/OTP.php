<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/22
 * Time: 15:30
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OTP extends Model
{
    use HasFactory;

    protected $fillable = ['phone_number', 'otp', 'expires_at'];
}