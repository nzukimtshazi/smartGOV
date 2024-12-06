<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/19
 * Time: 12:45
 */

namespace App\Http\Controllers;

use App\Models\AirAmbulance;
use App\Models\CaseType;
use App\Models\District;
use App\Models\Incident;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AirAmbulanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $air_ambulances = AirAmbulance::where('id', '>', 0)
            ->where('status', '!=', 'Logged')->get();
        return view('air_ambulance.index', compact('air_ambulances'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $institutions = Institution::where('id', '>', 0)->get();
        $caseTypes = CaseType::where('id', '>', 0)->get();
        $incidents = Incident::where('id', '>', 0)->get();

        return view('air_ambulance.add', compact('institutions', 'caseTypes', 'incidents'));
    }

    // store page 1
    public function storePage(Request $request)
    {
        $request->session()->put('data_page_1', $request->all()); // Storing all form data
        return redirect()->route('add2AirAmb');
    }

    public function add2(Request $request)
    {
        $dataFromPage1 = $request->session()->get('data_page_1');
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
        $dataFromPage1 = session()->get('data_page_1');
        $dataFromPage2 = $request->all(); // Data from Page 2
        $combinedData = array_merge($dataFromPage1, $dataFromPage2);

        $air_ambulance = new AirAmbulance($combinedData);
        $air_ambulance->name = $combinedData['fullName'];
        $air_ambulance->telephoneNo = $combinedData['telephoneNo'];
        $air_ambulance->mobileNo = $combinedData['mobileNo'];
        $air_ambulance->institution_type = $combinedData['institution_type'];
        $air_ambulance->aircraft_type = $combinedData['aircraft_type'];
        $air_ambulance->caller_type = $combinedData['call_type'];
        $air_ambulance->service_provider = $combinedData['service_provider'];
        $air_ambulance->motivation = $combinedData['motivation'];
        $air_ambulance->referring_district = $combinedData['ref_district_id'];
        $institution = Institution::find($combinedData['ref_institution_id']);
        $air_ambulance->referring_institution = $institution->name;
        $air_ambulance->referring_ward = $combinedData['ward'];
        $air_ambulance->referring_doctor = $combinedData['doctor'];
        $air_ambulance->referring_telephoneNo = $combinedData['telephone_no'];
        $air_ambulance->referring_mobileNo = $combinedData['mobile_no'];
        $air_ambulance->receiving_district = $combinedData['rec_district_id'];
        $recInst = Institution::find($combinedData['rec_institution_id']);
        $air_ambulance->receiving_institution = $recInst->name;
        $air_ambulance->receiving_ward = $combinedData['recWard'];
        $air_ambulance->receiving_doctor = $combinedData['recDoctor'];
        $air_ambulance->receiving_telephoneNo = $combinedData['recTelephone_no'];
        $air_ambulance->receiving_mobileNo = $combinedData['recMobile_no'];
        $air_ambulance->patientName = $combinedData['patient_name'];
        $air_ambulance->gender = $combinedData['gender'];
        $air_ambulance->age = $combinedData['age'];
        $air_ambulance->weight = $combinedData['weight'];
        $air_ambulance->diagnosis = $combinedData['diagnosis'];
        $air_ambulance->hotResponse_district = $combinedData['hotResponse_district'];
        $air_ambulance->weather = $combinedData['weather'];
        $air_ambulance->GPS_latitude = $combinedData['gps_latitude'];
        $air_ambulance->GPS_longitude = $combinedData['gps_longitude'];
        $air_ambulance->pickUp_point = $combinedData['pickUp_point'];
        $air_ambulance->landing_area = $combinedData['landing_area'];
        $air_ambulance->landmarks = $combinedData['landmark'];
        $air_ambulance->ground_contact = $combinedData['ground_contact'];
        $air_ambulance->marking_devices = $combinedData['marking_devices'];
        $air_ambulance->request_status = $combinedData['req_status'];
        $air_ambulance->updated_by = $combinedData['updated_by'];
        $air_ambulance->time_authorized = $combinedData['auth_time'];
        $air_ambulance->reason = $combinedData['auth_reason'];
        $air_ambulance->standDown_name = $combinedData['down_name'];
        $air_ambulance->notification = $combinedData['notifications'];
        $air_ambulance->standDown_reason = $combinedData['reason'];
        $air_ambulance->respiratory = $combinedData['respiratory'];
        $air_ambulance->respiratory_rate = $combinedData['r_rate'];
        $air_ambulance->airway_methods = $combinedData['airway'];
        $air_ambulance->PEEP = $combinedData['peep'];
        $air_ambulance->interCoastal_drain = $combinedData['intercoastal'];
        $air_ambulance->drug_name = $combinedData['d_name'];
        $air_ambulance->dose = $combinedData['d_dose'];
        $air_ambulance->fluid_amount_andType = $combinedData['d_fluid_amount'];
        $air_ambulance->drugInfuse_rate = $combinedData['d_rate'];
        $air_ambulance->drug_start = $combinedData['d_start'];
        $air_ambulance->drug_stop = $combinedData['d_stop'];
        $air_ambulance->drug_left = $combinedData['d_left'];
        $air_ambulance->pulse_rate = $combinedData['c_rate'];
        $air_ambulance->pulse_rhythm = $combinedData['rhythm'];
        $air_ambulance->blood_pressure = $combinedData['c_blood'];
        $air_ambulance->IVLine_central = $combinedData['c_iv_line_c'];
        $air_ambulance->paceMaker = $combinedData['pacemaker'];
        $air_ambulance->IVLine_peripheral = $combinedData['c_iv_line_p'];
        $air_ambulance->arterial_line = $combinedData['c_arterial'];
        $air_ambulance->glasgow_comaScale = $combinedData['n_glasgow'];
        $air_ambulance->eyes = $combinedData['n_eyes'];
        $air_ambulance->motor = $combinedData['n_motor'];
        $air_ambulance->verbal = $combinedData['n_verbal'];
        $air_ambulance->pupils = $combinedData['n_pupils'];
        $air_ambulance->left_pupil = $combinedData['n_left'];
        $air_ambulance->right_pupil = $combinedData['n_right'];
        $air_ambulance->ph = $combinedData['b_ph'];
        $air_ambulance->p02 = $combinedData['b_p02'];
        $air_ambulance->pC02 = $combinedData['b_pC02'];
        $air_ambulance->Hc03 = $combinedData['b_hc03'];
        $air_ambulance->Sa02 = $combinedData['b_sa03'];
        $air_ambulance->Hb = $combinedData['b_hb'];
        $air_ambulance->WWc = $combinedData['b_wwc'];
        $air_ambulance->Napos = $combinedData['b_na'];
        $air_ambulance->kpos = $combinedData['b_k'];
        $air_ambulance->urea = $combinedData['b_urea'];
        $air_ambulance->cardiac_enzymes = $combinedData['b_cardiac'];
        $air_ambulance->terpinen_T = $combinedData['b_torpinen'];
        $air_ambulance->CPK = $combinedData['b_cpk'];
        $air_ambulance->sugar_level = $combinedData['b_sugar'];
        $air_ambulance->ventilator = $combinedData['e_ventilator'];
        $air_ambulance->ECG_monitor= $combinedData['e_monitor'];;
        $air_ambulance->capnograph = $combinedData['e_capnograph'];
        $air_ambulance->cervical_traction = $combinedData['e_cervical'];
        $air_ambulance->incubator = $combinedData['e_incubator'];
        $air_ambulance->hot_box = $combinedData['e_hot_box'];
        $air_ambulance->other = $combinedData['e_other'];
        $air_ambulance->time_mobile = $combinedData['m_time'];
        $air_ambulance->ETD = $combinedData['m_etd'];
        $air_ambulance->arrive_refuel = $combinedData['m_a_refuel'];
        $air_ambulance->place = $combinedData['m_place'];
        $air_ambulance->depart_refuel = $combinedData['m_d_refuel'];
        $air_ambulance->ETA_toScene = $combinedData['m_eta_s'];
        $air_ambulance->arrive_scene = $combinedData['m_a_scene'];
        $air_ambulance->scenePerson_informed = $combinedData['scenePerson_informed'];
        $air_ambulance->depart_scene = $combinedData['m_a_scene'];
        $air_ambulance->depart_destination = $combinedData['m_d_scene'];
        $air_ambulance->ETA_toDestination = $combinedData['m_eta_d'];
        $air_ambulance->arrive_destination = $combinedData['m_a_destination'];
        $air_ambulance->destPerson_informed = $combinedData['destPerson_informed2'];
        $air_ambulance->depart_destination = $combinedData['m_depart_d'];
        $air_ambulance->ETA_toBase = $combinedData['m_eta_base'];
        $air_ambulance->arrive_base = $combinedData['m_a_base'];
        $air_ambulance->total_airtime = $combinedData['total_airtime'];
        $air_ambulance->additional_info = $combinedData['additional_info'];
        $air_ambulance->status = 'Logged';
        $air_ambulance->reference = 'AA-' . time() . '-' . rand(0, 00);
        $district = District::where('name', '=', $combinedData['district_id'])->first();
        $air_ambulance->district_id = $district->id;
        $air_ambulance->institution_id = $combinedData['institution_id'];
        $user = Auth::user();
        $air_ambulance->user_id = $user->getAuthIdentifier();
        $air_ambulance->caseType_id = $combinedData['caseType_id'];
        $air_ambulance->incident_id =$combinedData['incident_id'];

        if ($air_ambulance->save())
            return Redirect::route('air_ambulance')->with('success', 'Successfully requested an air ambulance!');
        else
            return Redirect::route('addAirAm')->withInput()->withErrors($air_ambulance->errors());
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $air_ambulance = AirAmbulance::find($id);
        return view('air_ambulance.edit', ['air_ambulance' => $air_ambulance]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $action = $request->input('action');
        $air_ambulance = AirAmbulance::find($id);

        if($action == 'approve')
            $air_ambulance->status = 'Approved';
        else
            $air_ambulance->status = 'Declined';

        if ($air_ambulance->update())
            return Redirect::route('air_ambulance')->with('success', 'Successfully approve/declined air ambulance!');
        else
            return Redirect::route('air_ambulance.edit', [$id])->withInput()->withErrors($air_ambulance->errors());
    }

    public function approve()
    {
        $air_ambulances = AirAmbulance::where('id', '>', 0)
            ->where('status', '=', 'Logged')->get();

        return view('air_ambulance.approve', compact('air_ambulances'));
    }

    public function getDistrictByInstitution($institutionId)
    {
        $institution = Institution::find($institutionId);
        $district = $institution ? $institution->district : null; // Get the associated district
        return response()->json(['district' => $district]);
    }
}
