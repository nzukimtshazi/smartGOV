<?php
/**
 * Created by PhpStorm.
 * User: dataXuser
 * Date: 2024/11/14
 * Time: 20:06
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image_path'];
}