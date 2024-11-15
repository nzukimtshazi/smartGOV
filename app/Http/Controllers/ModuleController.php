<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/14
 * Time: 20:00
 */

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::all();
        return view('module.index', compact('modules'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('module.add');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filename = '';

        if ($request->hasFile('img')){
            $filename = $request->getSchemeAndHttpHost() . '/images/' . time() . '.' . $request->img->extension();
            $request->img->move(public_path('/images/'), $filename);
        }
        $module = Module::create([
            'image_path' => $filename,
            'name' => $request->name,
        ]);
        return Redirect::route('modules')->with('success', 'Successfully added a module!');
    }
}