<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/14
 * Time: 18:33
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'district_id'];

}