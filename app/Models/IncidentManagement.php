<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/20
 * Time: 07:31
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentManagement extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'telephoneNo', 'mobileNo', 'email', 'reportNo', 'institution_type', 'route',
    'GPS_longitude', 'GPS_latitude', 'incident_location', 'adult_entrapments', 'adult_red', 'adult_yellow', 'adult_green',
    'adult_blue', 'adult_total', 'child_entrapments', 'child_red', 'child_yellow', 'child_green', 'child_blue',
    'child_total', 'response_ALS', 'response_doctor', 'PTV', 'ESVs', 'air_support', 'response_co_ordination', 'rescue',
    'disaster_bus', 'truck', 'fire_truck', 'rescue_boat', 'traffic_units', 'SAPS_units', 'other', 'resource_ALS',
    'resource_doctor', 'NSR', 'sharks_board', 'managers', 'BLS', 'drivers', 'fire_fighters', 'SAPS', 'navy',
    'resource_airForce', 'task_force', 'army', 'ILS', 'resource_co_ordination', 'mountain_rescue', 'health_district',
    'health_institution', 'health_institution_type', 'inst_blue', 'inst_red', 'inst_yellow', 'inst_green', 'inst_total',
    'response_time', 'incident_time', 'scene_duration', 'total_time', 'distance_toHospital', 'private_EMS', 'fire_services',
    'local_authority', 'police', 'service_airForce', 'roadTraffic_inspectorate', 'MRCC_activated', 'call_status',
    'reference', 'district_id', 'institution_id', 'user_id', 'caller_id', 'type_id', 'first_onScene_id'];
}
