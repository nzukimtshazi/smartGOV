<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/20
 * Time: 07:52
 */

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\IncidentManagement;
use App\Models\Institution;
use Illuminate\Http\Request;
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
        $institutions = Institution::where('id', '>', 0)->get();

        return view('incident_management.add', compact('districts', 'institutions'));
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $incident_management = new IncidentManagement($input);

        if ($incident_management->save())
            return Redirect::route('incident_management')->with('success', 'Successfully managed an incident!');
        else
            return Redirect::route('incidentMan')->withInput()->withErrors($incident_management->errors());
    }
}