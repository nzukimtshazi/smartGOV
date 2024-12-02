<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/26
 * Time: 22:26
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirstOnScene extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
}