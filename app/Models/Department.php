<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/17
 * Time: 20:56
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'no_of_beds', 'beds_available', 'beds_occupied', 'occupancy_rate', 'reference',
    'institution_id'];

}