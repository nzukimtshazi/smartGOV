<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/20
 * Time: 15:04
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyOperationalStatus extends Model
{
    use HasFactory;

    protected $fillable = ['operational_date', 'shift', 'caller', 'position', 'reference', 'district_id', 'user_id'];
}