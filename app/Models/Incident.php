<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/19
 * Time: 17:57
 */

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

}