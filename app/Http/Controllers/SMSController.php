<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/27
 * Time: 21:50
 */

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Group;
use App\Models\SMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $smses = SMS::where('id', '>', 0)->get();
        return view('groupSms.index', compact('smses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::where('id', '>', 0)->get();
        return view('groupSms.create', compact('departments'));
    }
    public function store(Request $request)
    {
        $selectedCheckboxes = $request->input('checkboxes', []);
        $input = $request->all();

        foreach ($selectedCheckboxes as $selected)
        {

            $smses = new SMS($input);
            $smses->content = $request->contents;
            $smses->dept_id = $request->dept_id;

            $user = Auth::user();
            $smses->user_id = $user->getAuthIdentifier();

            $collection = Group::where('name', 'like', '%' . strtolower($selected) . '%')->get();
            if ($collection) {
                $group = $collection->first();
                $smses->group_id = $group->id;
                $smses->save();
            }
        }
        return Redirect::route('login');
    }
}