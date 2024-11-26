<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/26
 * Time: 17:48
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'count', 'reference', 'district_id'];
}