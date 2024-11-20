<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/18
 * Time: 12:29
 */

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintManagement extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'telephoneNo', 'mobileNo', 'email', 'caller_type', 'company', 'contact_person',
        'location', 'location_ofIncident', 'additional_info', 'reference',  'district_id', 'user_id', 'complaint_id'];
}