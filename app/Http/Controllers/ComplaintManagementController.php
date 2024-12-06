<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/18
 * Time: 12:25
 */

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\ComplaintManagement;
use App\Models\District;
use App\Models\Institution;
use App\Models\InstitutionDailyStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ComplaintManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = ComplaintManagement::where('id', '>', 0)->get();
        return view('complaint_management.index', compact('complaints'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $institutions = Institution::where('id', '>', 0)->get();
        $complaint_types = Complaint::where('id', '>', 0)->get();
        return view('complaint_management.add', compact('institutions', 'complaint_types'));
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
        $complaint_management = new ComplaintManagement($input);
        $complaint_management->name = $request->name;
        $complaint_management->telephoneNo = $request->telephoneNo;
        $complaint_management->mobileNo = $request->mobileNo;
        $complaint_management->email = $request->email;
        $complaint_management->caller_type = $request->caller_type;
        $complaint_management->institution_type = $request->institution_type;
        $complaint_management->company = $request->company;
        $complaint_management->contact_person = $request->contact_person;
        $complaint_management->location = $request->location;
        $complaint_management->location_ofIncident = $request->location_ofIncident;
        $complaint_management->district_name = $request->district2_id;
        $institution = Institution::find($request->institution2_id);
        $complaint_management->institution_name = $institution->name;
        $complaint_management->complaint_institution_type = $request->institution2_type;
        $complaint_management->additional_info = $request->additional_info;
        $complaint_management->reference = 'CM-' . time() . '-' . rand(0, 00);
        $district = District::where('name', '=', $request->district_id)->first();
        $complaint_management->district_id = $district->id;
        $complaint_management->institution_id = $request->institution_id;
        $user = Auth::user();
        $complaint_management->user_id = $user->getAuthIdentifier();
        $complaint_management->complaints_id = $request->type_id;

        if ($complaint_management->save())
            return Redirect::route('comMan')->with('success', 'Successfully managed a complaint!');
        else
            return Redirect::route('addComMan')->withInput()->withErrors($complaint_management->errors());
    }
}