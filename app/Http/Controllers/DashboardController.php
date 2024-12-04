<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/12/02
 * Time: 15:00
 */

namespace App\Http\Controllers;

use App\Models\AirAmbulance;
use app\Models\ComplaintManagement;
use App\Models\DailyOperationalStatus;
use App\Models\IncidentManagement;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get data for categories or statuses (optional)
        $air_ambulance = AirAmbulance::where('id', '>', 0)->count();
        $complaints = ComplaintManagement::where('id', '>', 0)->count();
        $totalIncidents = IncidentManagement::where('id', '>', 0)->count();

        $stats = ['airAmbulance', 'complaintManagement', 'incidentManagement'];

        $daily_stats = array();

        foreach ($stats as $stat)
        {
            $dailyStats = new DailyStats();
            switch ($stat) {
                case 'airAmbulance':
                    $dailyStats->name = $stat;
                    $dailyStats->count = $air_ambulance;
                    break;
                case 'complaintManagement':
                    $dailyStats->name = $stat;
                    $dailyStats->count = $complaints;
                    break;
                case 'incidentManagement':
                    $dailyStats->name = $stat;
                    $dailyStats->count = $totalIncidents;
                    break;
                default:
                    break;
            }
            array_push($daily_stats, $dailyStats);
        }
        return view('dashboard.index', compact('daily_stats'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @param  int  $ids
     * @return \Illuminate\Http\Response
     */
    public function airAmbulance()
    {
        $ambulances = AirAmbulance::where('id', '>', 0)->get();
        return view('dashboard.ambulances', compact('ambulances'));
    }
    /**
     * Display a listing of the resource.
     *
     * @param  int  $ids
     * @return \Illuminate\Http\Response
     */
    public function incidentHistory()
    {
        $incidents = IncidentManagement::where('id', '>', 0)->get();
        return view('dashboard.incidents', compact('incidents'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param  int  $ids
     * @return \Illuminate\Http\Response
     */
    public function complaintManagement()
    {
        $complaints = ComplaintManagement::where('id', '>', 0)->get();
        return view('dashboard.complaints', compact('complaints'));
    }
}
class DailyStats
{
    public $name;
    public $count;
}
