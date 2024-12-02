<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/27
 * Time: 23:13
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
}