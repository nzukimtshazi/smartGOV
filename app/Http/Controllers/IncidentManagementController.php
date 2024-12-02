<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/20
 * Time: 07:52
 */

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\FirstOnScene;
use App\Models\IncidentManagement;
use App\Models\IncidentType;
use App\Models\Informers;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class IncidentManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incident_managements = IncidentManagement::where('id', '>', 0)->get();
        return view('incident_management.index', compact('incident_managements'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $districts = District::where('id', '>', 0)->get();
        $institutions = Institution::where('id', '>', 0)->get();
        $callers = Informers::where('id', '>', 0)->get();
        $incident_types = IncidentType::where('id', '>', 0)->get();
        $first_onScenes = FirstOnScene::where('id', '>', 0)->get();

        return view('incident_management.add', compact('districts', 'institutions', 'callers',
            'incident_types', 'first_onScenes'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $incident_management = new IncidentManagement($input);
        $incident_management->name = $request->name;
        $incident_management->telephoneNo = $request->telephoneNo;
        $incident_management->mobileNo = $request->mobileNo;
        $incident_management->email = $request->e_mail;
        $incident_management->reportNo = $request->reportNo;
        $incident_management->institution_type = $request->type;
        $incident_management->route = $request->route;
        $incident_management->GPS_latitude = $request->gps_latitude;
        $incident_management->GPS_longitude = $request->gps_longitude;
        $incident_management->incident_location = $request->incident_location;
        $incident_management->adult_entrapments = $request->adult_entrapment;
        $incident_management->adult_red = $request->adult_red;
        $incident_management->adult_yellow = $request->adult_yellow;
        $incident_management->adult_green = $request->adult_green;
        $incident_management->adult_blue = $request->adult_blue;
        $incident_management->adult_total = $request->adult_total;
        $incident_management->child_entrapments = $request->child_entrapment;
        $incident_management->child_red = $request->child_red;
        $incident_management->child_yellow = $request->child_yellow;
        $incident_management->child_green = $request->child_green;
        $incident_management->child_blue = $request->child_blue;
        $incident_management->child_total = $request->child_total;
        $incident_management->response_ALS = $request->als;
        $incident_management->response_doctor = $request->doctor;
        $incident_management->PTV = $request->ptv;
        $incident_management->ESVs = $request->esv;
        $incident_management->air_support = $request->air;
        $incident_management->response_co_ordination = $request->co;
        $incident_management->rescue = $request->rescue;
        $incident_management->disaster_bus = $request->bus;
        $incident_management->truck = $request->truck;
        $incident_management->fire_truck = $request->fire;
        $incident_management->rescue_boat = $request->boat;
        $incident_management->traffic_units = $request->units;
        $incident_management->SAPS_units = $request->saps;
        $incident_management->other = $request->other;
        $incident_management->resource_ALS = $request->hrals;
        $incident_management->resource_doctor = $request->hrdoctor;
        $incident_management->NSR = $request->nsri;
        $incident_management->sharks_board = $request->shark;
        $incident_management->managers = $request->managers;
        $incident_management->BLS = $request->bls;
        $incident_management->drivers = $request->drivers;
        $incident_management->fire_fighters = $request->fighters;
        $incident_management->SAPS = $request->hrSAPS;
        $incident_management->navy = $request->navy;
        $incident_management->resource_airForce = $request->airforce;
        $incident_management->task_force = $request->task;
        $incident_management->army = $request->hrArmy;
        $incident_management->ILS = $request->ils;
        $incident_management->resource_co_ordination = $request->hrCo;
        $incident_management->mountain_rescue = $request->hrRescue;
        $district = District::find($request->district2);
        $incident_management->health_district = $district->name;
        $institution = Institution::find($request->institution2);
        $incident_management->health_institution = $institution->name;
        $incident_management->health_institution_type = $request->type;
        $incident_management->inst_blue = $request->health_blue;
        $incident_management->inst_red = $request->health_red;
        $incident_management->inst_yellow = $request->health_yellow;
        $incident_management->inst_green = $request->health_green;
        $incident_management->inst_total = $request->health_total;
        $incident_management->response_time = $request->response_time;
        $incident_management->incident_time = $request->incident_time;
        $incident_management->scene_duration = $request->duration;
        $incident_management->total_time = $request->total_time;
        $incident_management->distance_toHospital = $request->distance;
        $incident_management->private_EMS = $request->private_ems;
        $incident_management->fire_services = $request->services;
        $incident_management->local_authority = $request->authority;
        $incident_management->police = $request->police;
        $incident_management->services_airForce = $request->air_force;
        $incident_management->roadTraffic_inspectorate = $request->inspectorate;
        $incident_management->MRCC_activated = $request->mrcc;
        $incident_management->call_status = $request->additional_info;
        $incident_management->reference = 'IM-' . time() . '-' . rand(0, 00);
        $incident_management->district_id = $request->district;
        $incident_management->institution_id = $request->institution;
        $user = Auth::user();
        $incident_management->user_id = $user->getAuthIdentifier();
        $incident_management->caller_id = $request->caller_id;
        $incident_management->type_id = $request->type_id;
        $incident_management->first_onScene_id = $request->onScene_id;


        if ($incident_management->save())
            return Redirect::route('listIM')->with('success', 'Successfully managed an incident!');
        else
            return Redirect::route('addIM')->withInput()->withErrors($incident_management->errors());
    }
}