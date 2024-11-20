<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/18
 * Time: 11:30
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenericCall extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'telephoneNo', 'mobileNo', 'email', 'call_type', 'institution_type',
        'call_status', 'reference', 'district_id', 'institution_id', 'user_id'];
}