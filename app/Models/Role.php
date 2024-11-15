<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/14
 * Time: 18:29
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

}