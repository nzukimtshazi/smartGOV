<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/27
 * Time: 21:47
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
    use HasFactory;

    protected $table = 'smses';

    protected $fillable = ['content', 'dept_id', 'group_id', 'user-id'];
}