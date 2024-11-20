<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/20
 * Time: 13:03
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForensicMortuary extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'contactNo', 'mobileNo', 'deceased_name', 'gender', 'age', 'ethnic_group', 'SAPS_caseNo',
    'cause_of_death', 'place', 'area_type', 'deceased_pickUp_point', 'guide_pickUp_point', 'physical_address', 'SAPS_name',
    'SAPS_station', 'SAPS_time', 'deceased_delivery_point', 'delivery_service_provide', 'transport_method', 'provider',
    'service_providerName', 'contactPerson', 'fleetNo', 'depot', 'crew1', 'crew2', 'call_status', 'reference',
    'district_id', 'classification_id', 'user_id'];
}