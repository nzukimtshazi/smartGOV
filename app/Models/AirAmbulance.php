<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/19
 * Time: 13:06
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirAmbulance extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'telephoneNo', 'mobileNo', 'institution_type', 'aircraft_type', 'caller_type',
    'service_provider', 'motivation', 'referring_district', 'referring_institution', 'referring_ward', 'referring_doctor',
    'referring_telephoneNo', 'referring_mobileNo', 'receiving_district', 'receiving_institution', 'receiving_ward',
    'receiving_doctor', 'receiving_telephoneNo', 'receiving_mobileNo', 'patientName', 'gender', 'age', 'weight',
    'diagnosis', 'hotResponse_district', 'weather', 'GPS_latitude', 'GPS_longitude', 'pickUp_point', 'landing_area',
    'landmarks', 'ground_contact', 'marking_devices', 'request_status', 'updated_by', 'time_authorized', 'reason',
    'standDown_name', 'notification', 'standDown_reason', 'respiratory', 'respiratory_rate', 'airway_methods', 'PEEP',
    'interCoastal_drain', 'drug_name', 'dose', 'fluid_amount_andType', 'druInfuse_rate', 'drug_start', 'drug_stop',
    'drug_left', 'pulse_rate', 'pulse_rhythm', 'blood_pressure', 'IVLine_central', 'paceMaker', 'IVLine_peripheral',
    'arterial_line', 'glasgow_comaScale', 'eyes', 'motor', 'verbal', 'pupils', 'left_pupil', 'right_pupil', 'ph', 'p02',
    'pC02', 'Hc03', 'Sa02', 'Hb', 'WWC', 'Na+', 'k+', 'urea', 'cardiac_enzymes', 'terpinen_T', 'CPK', 'sugar_level',
    'ventilator', 'ECG_monitor', 'capnograph', 'cervical_traction', 'incubator', 'hot_box', 'other', 'time_mobile',
    'ETD', 'arrive_fuel', 'place', 'depart_fuel', 'ETA_toScene', 'person_informed', 'depart_scene', 'ETA_toDestination',
    'arrive_scene', 'depart_destination', 'arrive_destination', 'ETA_toBase', 'arrive_base', 'total_airtime',
    'additional_info', 'reference', 'district_id', 'institution_id', 'user_id', 'caseType_id', 'incident_id'];
}