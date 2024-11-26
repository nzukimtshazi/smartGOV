<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/20
 * Time: 15:00
 */

namespace App\Http\Controllers;

use App\Models\Ambulance;
use App\Models\DailyOperational;
use App\Models\DailyOperationalStatus;
use App\Models\District;
use App\Models\Institution;
use App\Models\OperationalSupport;
use App\Models\Overtime;
use App\Models\PtsBus;
use App\Models\StaffLeave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::where('id', '>', 0)->get();
        $ambulances = ['Schedule Emergency', 'Operational - Emergency', 'Operational - Obsteric', 'Pool Ambulances',
                    'U / S Ambulances'];
        $ptsBuses = ['Operational Buses', 'Pool Buses', 'U / S Buses'];
        $supports = ['ALS Operational', 'Rescue Operational', 'Supervisory Operational', 'Disaster Operational',
                    'Pool Operational', 'U / S Operational'];
        $staff_leaves = ['Vacational Leave', 'Study/Course', 'Sick Leave', 'Injury On Duty', 'Other Leave'];
        $overtimes = ['Emergency Operations', 'Communications Centre', 'Patient Transport Services', 'Other'];

        return view('daily_operational.create', compact('districts', 'ambulances', 'ptsBuses', 'supports',
            'staff_leaves', 'overtimes'));
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
        $daily_operational = new DailyOperationalStatus($input);
        $daily_operational->operational_date = $request->date_captured;
        $daily_operational->shift = $request->shift;
        $daily_operational->caller = $request->name;
        $daily_operational->position = $request->position;
        $daily_operational->reference = 'DOS-' . time() . '-' . rand(0, 00);
        $daily_operational->additional_info = $request->additional_info;
        $user = Auth::user();
        $daily_operational->user_id = $user->getAuthIdentifier();

        if ($daily_operational->save()) {
            foreach ($request->district as $districtId => $operations) {
                foreach ($operations as $key => $operation) {
                    $string = explode("_", $key);
                    switch ($string[0]) {
                        case 'ambulance':
                            $ambulance = new Ambulance();
                            $ambulance->name = $string[1];
                            $ambulance->count = $operation;
                            $ambulance->reference = $daily_operational->reference;
                            $ambulance->district_id = $districtId;
                            $ambulance->save();
                            break;
                        case 'ptsBus':
                            $ptsBus = new PtsBus();
                            $ptsBus->name = $string[1];
                            $ptsBus->count = $operation;
                            $ptsBus->reference = $daily_operational->reference;
                            $ptsBus->district_id = $districtId;
                            $ptsBus->save();
                            break;
                        case 'support':
                            $support = new OperationalSupport();
                            $support->name = $string[1];
                            $support->count = $operation;
                            $support->reference = $daily_operational->reference;
                            $support->district_id = $districtId;
                            $support->save();
                            break;
                        case 'staff':
                            $staff = new StaffLeave();
                            $staff->description = $string[1];
                            $staff->count = $operation;
                            $staff->reference = $daily_operational->reference;
                            $staff->district_id = $districtId;
                            $staff->save();
                            break;
                        case 'overtime':
                            $overtime = new Overtime();
                            $overtime->type = $string[1];
                            $overtime->count = $operation;
                            $overtime->reference = $daily_operational->reference;
                            $overtime->district_id = $districtId;
                            $overtime->save();
                            break;
                        default:
                            // Code to be executed if no case matches
                            break;
                    }
                }

            }
            return Redirect::route('listDOS')->with('success', 'Successfully captured daily operation status!');
        } else
            return Redirect::route('createDOS')->withInput()->withErrors($daily_operational->errors());
    }
}