<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/20
 * Time: 08:20
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionDailyStatus extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'role', 'mobileNo', 'email', 'institution_type', 'manager', 'contactNo',
    'no_of_admissions', 'admission_information', 'no_of_deaths', 'cause_of_death', 'no_of_births', 'births_information',
    'call_status', 'reference', 'district_id', 'institution_id', 'department_id', 'user_id'];
}