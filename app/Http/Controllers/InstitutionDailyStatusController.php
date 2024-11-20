<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/20
 * Time: 08:29
 */

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Institution;
use App\Models\InstitutionDailyStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class InstitutionDailyStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institution_status = InstitutionDailyStatus::where('id', '>', 0)->get();

        return view('institution_status.index', compact('institution_status'));
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

        return view('institution_status.add', compact('districts', 'institutions'));
    }


    public function store(Request $request)
    {

        $input = $request->all();
        $institution_status = new InstitutionDailyStatus($input);

        $institution_status->name = $request->name;
        $institution_status->role = 'System Admin';
        $institution_status->mobileNo = $request->mobileNo;
        $institution_status->email = $request->email;
        $institution_status->institution_type = $request->institution_type;
        $institution_status->manager = $request->manager;
        $institution_status->contactNo = $request->contactNo;
        $institution_status->no_of_admissions = 5;
        $institution_status->admission_information = 'None';
        $institution_status->no_of_deaths = 0;
        $institution_status->cause_of_death = 'n/a';
        $institution_status->no_of_births = 3;
        $institution_status->births_information = 'Delivery for all 3 was successful';
        $institution_status->call_status = 'None';
        $institution_status->reference = 'HCDS01';
        $institution_status->district_id = $request->district_id;
        $institution_status->institution_id = $request->institution_id;
        $institution_status->user_id = 1;

        if ($institution_status->save())
            return Redirect::route('instStatus')->with('success', 'Successfully reported institution status!');
        else
            return Redirect::route('addSta')->withInput()->withErrors($institution_status->errors());
    }
}