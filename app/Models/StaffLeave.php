<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/26
 * Time: 17:42
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffLeave extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'count', 'reference', 'district_id'];
}