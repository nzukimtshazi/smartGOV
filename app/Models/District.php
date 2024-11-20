<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/17
 * Time: 20:53
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

}