<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/20
 * Time: 15:00
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DailyOperationalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $air_ambulances = AirAmbulance::where('id', '>', 0)->get();
        return view('air_ambulance.index', compact('air_ambulances'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $districts = District::where('id', '>', 0)->get();

        return view('daily_operational.add', compact('districts'));
    }

    // store page 1
    public function storePage(Request $request)
    {
        //dd($request);
        $district = District::where('id', '=', $request->district_id)->first();
        $institution = Institution::where('id', '=', $request->institution_id)->first();
        session([
            'name' => $request->name,
            'telephoneNo' => $request->telephone_no,
            'mobileNo' => $request->mobile_no,
            //'district' => $district->name,
            //'institution' => $institution->name,
        ]);

        return redirect()->route('add2AirAmb');
    }

    public function add2(Request $request)
    {
        return view('air_ambulance.add2');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $air_ambulance = new AirAmbulance($input);
        $air_ambulance->name = 'Nzuki Mtshazi';  //session(name);
        $air_ambulance->telephoneNo = '0336541478'; // session('telephoneNo');
        $air_ambulance->mobileNo = '0719158141'; //session('mobileNo');
        $air_ambulance->institution_type = 'Hospital';
        $air_ambulance->aircraft_type = 'Rotor Wing';
        $air_ambulance->caller_type = 'Hot Response';
        $air_ambulance->service_provider = 'provider';
        $air_ambulance->motivation = 'Testing';
        $air_ambulance->referring_district = 'Ethekwini';
        $air_ambulance->referring_institution = 'Madadeni';
        $air_ambulance->referring_ward = 'Emergency Unit';
        $air_ambulance->referring_doctor = 'Dr Unknown';
        $air_ambulance->referring_telephoneNo = 'n/a';
        $air_ambulance->referring_mobileNo = '1236547890';
        $air_ambulance->receiving_district = 'Ilembe';
        $air_ambulance->receiving_institution = 'Chisa';
        $air_ambulance->receiving_ward = 'Emergency Unit';
        $air_ambulance->receiving_doctor = 'Dr Receiver';
        $air_ambulance->receiving_telephoneNo = 'n/a';
        $air_ambulance->receiving_mobileNo = '3698741250';
        $air_ambulance->patientName = 'Sick Person';
        $air_ambulance->gender = 'Female';
        $air_ambulance->age = 42;
        $air_ambulance->weight = '61kg';
        $air_ambulance->diagnosis = 'Not yet known';
        $air_ambulance->hotResponse_district = 'Madadeni';
        $air_ambulance->weather = 'humid';
        $air_ambulance->GPS_latitude = '2365.12';
        $air_ambulance->GPS_longitude = '1235.25';
        $air_ambulance->pickUp_point = 'Hayfields';
        $air_ambulance->landing_area = 'Durban';
        $air_ambulance->landmarks = 'Not much';
        $air_ambulance->ground_contact = 'n/a';
        $air_ambulance->marking_devices = '1236547890';
        $air_ambulance->request_status = 'none';
        $air_ambulance->updated_by = 'Nzuki';
        $air_ambulance->time_authorized = '20 minutes';
        $air_ambulance->reason = 'none';
        $air_ambulance->standDown_name = 'n/a';
        $air_ambulance->notification = 'n/a';
        $air_ambulance->standDown_reason = ('name');
        $air_ambulance->respiratory = ('esv');
        $air_ambulance->respiratory_rate = 15;
        $air_ambulance->airway_methods = 'n/a';
        $air_ambulance->PEEP = 'n/a';
        $air_ambulance->interCoastal_drain = 'n/a';
        $air_ambulance->drug_name = 'Panado';
        $air_ambulance->dose = '2 tablets';
        $air_ambulance->fluid_amount_andType = 'n/a';
        $air_ambulance->druInfuse_rate = 120;
        $air_ambulance->drug_start = 'n/a';
        $air_ambulance->drug_stop = 'n/a';
        $air_ambulance->drug_left = 'none';
        $air_ambulance->pulse_rate = '15';
        $air_ambulance->pulse_rhythm = '3';
        $air_ambulance->blood_pressure = '80/120';
        $air_ambulance->IVLine_central = 'n/a';
        $air_ambulance->paceMaker = 'n/a';
        $air_ambulance->IVLine_peripheral = 'n/a';
        $air_ambulance->arterial_line = 'n/a';
        $air_ambulance->glasgow_comaScale = 'n/a';
        $air_ambulance->eyes = 'ok';
        $air_ambulance->motor = 'n/a';
        $air_ambulance->weight = '61kg';
        $air_ambulance->verbal = 'n/a';
        $air_ambulance->pupils = 'ok';
        $air_ambulance->left_pupil = 'black';
        $air_ambulance->right_pupil = 'blue';
        $air_ambulance->ph = 'n/a';
        $air_ambulance->p02 = 'n/a';
        $air_ambulance->pC02 = 'n/a';
        $air_ambulance->Hc03 = 'n/a';
        $air_ambulance->Sa02 = 'n/a';
        $air_ambulance->Hb = 'n/a';
        $air_ambulance->WWc = 'n/a';
        //$air_ambulance->Na+ 'n/a';
        //$air_ambulance->k+ = 'n/a';
        $air_ambulance->urea = 'n/a';
        $air_ambulance->cardiac_enzymes = 'n/a';
        $air_ambulance->terpinen_T = 'n/a';
        $air_ambulance->CPK = ('n/a');
        $air_ambulance->sugar_level = 'n/a';
        $air_ambulance->ventilator = 'n/a';
        $air_ambulance->ECG_monitor= 'n/a';;
        $air_ambulance->capnograph = 'n/a';
        $air_ambulance->cervical_traction = 'n/a';
        $air_ambulance->incubator = 'n/a';
        $air_ambulance->hot_box = 'n/a';
        $air_ambulance->other = 'none';
        $air_ambulance->time_mobile = 'n/a';
        $air_ambulance->ETD = 'n/a';
        $air_ambulance->arrive_fuel = 'n/a';
        $air_ambulance->place = 'n/a';
        $air_ambulance->depart_refuel = 'n/a';
        $air_ambulance->ETA_toScene = 'n/a';
        $air_ambulance->person_informed = 'Nzuki';
        $air_ambulance->depart_scene = 'n/a';
        $air_ambulance->receiving_doctor = 'Dr Receiver';
        $air_ambulance->ETA_toDestination = 'n/a';
        $air_ambulance->arrive_scene = 'n/a';
        $air_ambulance->depart_destination = 'n/a';
        $air_ambulance->arrive_destination = 'n/a';
        $air_ambulance->ETA_toBase = 'n/a';
        $air_ambulance->arrive_base = 'n/a';
        $air_ambulance->total_airtime = '180 minutes';
        $air_ambulance->additional_info = 'Nothing to add';
        $air_ambulance->reference = 'AA01';
        $air_ambulance->district_id = 1;
        $air_ambulance->institution_id = 1;
        $air_ambulance->user_id = 1;
        $air_ambulance->caseType_id = 1;
        $air_ambulance->incident_id = 2;

        if ($air_ambulance->save())
            return Redirect::route('air_ambulance')->with('success', 'Successfully requested an air ambulance!');
        else
            return Redirect::route('addAirAm')->withInput()->withErrors($air_ambulance->errors());
    }
}