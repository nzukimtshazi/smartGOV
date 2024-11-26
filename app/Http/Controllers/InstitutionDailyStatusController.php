<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/20
 * Time: 08:29
 */

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\District;
use App\Models\Institution;
use App\Models\InstitutionDailyStatus;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $roles = Role::where('id', '>', 0)->get();

        return view('institution_status.add', compact('districts', 'institutions', 'roles'));
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $institution_status = new InstitutionDailyStatus($input);

        $institution_status->name = $request->name;
        $institution_status->role_id = $request->role_id;
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
        $institution_status->call_status = $request->additional_info;
        $institution_status->reference = 'HCDS-' . time() . '-' . rand(0, 00);
        $institution_status->district_id = $request->district;
        $institution_status->institution_id = $request->institution;
        $user = Auth::user();
        $institution_status->user_id = $user->getAuthIdentifier();

        if ($institution_status->save()) {
            foreach ($request->departments as $department) {
                $dept = new Department();
                $dept->name = $department['name'];
                $dept->no_of_beds = $department['count'];
                $dept->beds_available = $department['available'];
                $dept->beds_occupied = $department['occupied'];
                $dept->occupancy_rate = round(($department['occupied'] / $department['count']) * 100, 2);
                $dept->reference = $institution_status->reference;
                $dept->institution_id = $request->institution;
                $dept->save();
            }
            return Redirect::route('instStatus')->with('success', 'Successfully reported institution status!');
        } else
            return Redirect::route('addSta')->withInput()->withErrors($institution_status->errors());
    }
}