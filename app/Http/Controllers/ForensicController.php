<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/20
 * Time: 12:55
 */

namespace App\Http\Controllers;

use App\Models\Classification;
use App\Models\District;
use App\Models\ForensicMortuary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ForensicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forensics = ForensicMortuary::where('id', '>', 0)->get();

        return view('forensic_mortuary.index', compact('forensics'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $classifications = Classification::where('id', '>', 0)->get();
        $districts = District::where('id', '>', 0)->get();

        return view('forensic_mortuary.add', compact('classifications', 'districts'));
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
        $forensic_mortuary = new ForensicMortuary($input);
        $forensic_mortuary->name = $request->name;
        $forensic_mortuary->contactNo = $request->contactNo;
        $forensic_mortuary->mobileNo = $request->mobileNo;
        $forensic_mortuary->deceased_name = $request->deceasedName;
        $forensic_mortuary->gender = $request->gender;
        $forensic_mortuary->age = $request->age;
        $forensic_mortuary->ethnic_group = $request->ethnic_group;
        $forensic_mortuary->SAPS_caseNo = $request->caseNo;
        $forensic_mortuary->cause_of_death = $request->cause_of_death;
        $forensic_mortuary->place = $request->place;
        $forensic_mortuary->area_type = $request->area;
        $forensic_mortuary->deceased_pickUp_point = $request->deceased_pickUp_point;
        $forensic_mortuary->guide_pickUp_point = $request->guide_pickUp_point;
        $forensic_mortuary->physical_address = $request->physical_address;
        $forensic_mortuary->SAPS_name = $request->SAPS_name;
        $forensic_mortuary->SAPS_station = $request->station;
        $forensic_mortuary->SAPS_time = $request->SAPS_time;
        $forensic_mortuary->deceased_delivery_point = $request->delivery_point;
        $forensic_mortuary->delivery_service_provider = $request->service_provider;
        $forensic_mortuary->transport_method = $request->transport_method;
        $forensic_mortuary->provider = $request->service_provider;
        $forensic_mortuary->service_providerName = $request->provider_name;
        $forensic_mortuary->contactPerson = $request->contactPerson;
        $forensic_mortuary->fleetNo = $request->fleetNo;
        $forensic_mortuary->depot = $request->depot;
        $forensic_mortuary->crew1 = $request->crew1;
        $forensic_mortuary->crew2 = $request->crew2;
        $forensic_mortuary->call_status = $request->additional_info;
        $forensic_mortuary->reference = 'FM-' . time() . '-' . rand(0, 00);
        $forensic_mortuary->district_id = $request->district;
        $forensic_mortuary->classification_id = $request->classification_id;
        $user = Auth::user();
        $forensic_mortuary->user_id = $user->getAuthIdentifier();

        if ($forensic_mortuary->save())
            return Redirect::route('foreMort')->with('success', 'Successfully logged a forensic report!');
        else
            return Redirect::route('addFM')->withInput()->withErrors($forensic_mortuary->errors());
    }
}