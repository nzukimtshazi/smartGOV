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
        $daily_operation = DailyOperationalStatus::where('id', '>', 0)->get();

        $operational_statuses = array();
        foreach ($daily_operation as $operation) {
            $operational_status = new OperationalStatus();
            $operational_status->statusId = $operation->id;
            $operational_status->dateCreated = $operation->operation_date;
            $operational_status->shift = $operation->shift;
            $operational_status->caller = $operation->caller;

            $emergencies = Ambulance::where('name', 'like', '%' . strtolower('rational - Emer') . '%')
                ->where('reference', '=', $operation->reference)
                ->where('operation_date', '=', $operation->operation_date)->count();
            $operational_status->emergency = $emergencies;

            $obstetric = Ambulance::where('name', 'like', '%' . strtolower('rational - Obst') . '%')
                ->where('reference', '=', $operation->reference)
                ->where('operation_date', '=', $operation->operation_date)->count();
            $operational_status->obstetric = $obstetric;

            $buses = PtsBus::where('name', 'like', '%' . strtolower('rational') . '%')
                ->where('reference', '=', $operation->reference)
                ->where('operation_date', '=', $operation->operation_date)->count();
            $operational_status->operational = $buses;

            $disaster = OperationalSupport::where('name', 'like', '%' . strtolower('saster') . '%')
                ->where('reference', '=', $operation->reference)
                ->where('operation_date', '=', $operation->operation_date)->count();
            $operational_status->disaster = $disaster;

            $leave = StaffLeave::where('reference', '=', $operation->reference)
                ->where('operation_date', '=', $operation->operation_date)->count();
            $operational_status->staff = $leave;

            $overtime = Overtime::where('reference', '=', $operation->reference)
                ->where('operation_date', '=', $operation->operation_date)->count();
            $operational_status->overtime = $overtime;

            array_push($operational_statuses, $operational_status);
        }

        return view('daily_operational.index', compact('operational_statuses'));
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
        $daily_operational->operation_date = $request->date_captured;
        $daily_operational->shift = $request->shift;
        $daily_operational->caller = $request->name;
        $daily_operational->position = $request->position;
        $daily_operational->reference = 'DOS-' . time() . '-' . rand(0, 00);
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
                            $ambulance->operation_date = $daily_operational->operation_date;
                            $ambulance->reference = $daily_operational->reference;
                            $ambulance->district_id = $districtId;
                            $ambulance->save();
                            break;
                        case 'ptsBus':
                            $ptsBus = new PtsBus();
                            $ptsBus->name = $string[1];
                            $ptsBus->count = $operation;
                            $ptsBus->operation_date = $daily_operational->operation_date;
                            $ptsBus->reference = $daily_operational->reference;
                            $ptsBus->district_id = $districtId;
                            $ptsBus->save();
                            break;
                        case 'support':
                            $support = new OperationalSupport();
                            $support->name = $string[1];
                            $support->count = $operation;
                            $support->operation_date = $daily_operational->operation_date;
                            $support->reference = $daily_operational->reference;
                            $support->district_id = $districtId;
                            $support->save();
                            break;
                        case 'staff':
                            $staff = new StaffLeave();
                            $staff->description = $string[1];
                            $staff->count = $operation;
                            $staff->operation_date = $daily_operational->operation_date;
                            $staff->reference = $daily_operational->reference;
                            $staff->district_id = $districtId;
                            $staff->save();
                            break;
                        case 'overtime':
                            $overtime = new Overtime();
                            $overtime->type = $string[1];
                            $overtime->count = $operation;
                            $overtime->operation_date = $daily_operational->operation_date;
                            $overtime->reference = $daily_operational->reference;
                            $overtime->district_id = $districtId;
                            $overtime->save();
                            break;
                        default:
                            break;
                    }
                }
            }
            return Redirect::route('listDOS')->with('success', 'Successfully captured daily operation status!');
        } else
            return Redirect::route('createDOS')->withInput()->withErrors($daily_operational->errors());
    }
}
class OperationalStatus {
    public $statusId;
    public $dateCreated;
    public $shift;
    public $caller;
    public $emergency;
    public $obstetric;
    public $operational;
    public $disaster;
    public $staff;
    public $overtime;
}