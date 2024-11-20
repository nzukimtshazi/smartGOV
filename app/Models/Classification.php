<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/20
 * Time: 12:58
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    use HasFactory;

    protected $fillable = ['description'];
}