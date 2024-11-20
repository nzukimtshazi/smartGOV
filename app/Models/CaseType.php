<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/19
 * Time: 17:54
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseType extends Model
{
    use HasFactory;

    protected $fillable = ['type'];

}