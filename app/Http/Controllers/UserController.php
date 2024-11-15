<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '>', 0)->get();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $roles = Role::where('id', '>', 0)->get();
        $institutions = Institution::where('id', '>', 0)->get();
        return view('user.add', compact('roles', 'institutions'));
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
        $user = new User($input);
        $user->firstName = $request->name;
        $user->surname = $request->surname;
        $user->user_role = 'System Admin';
        $user->institution = 'Madadeni';
        $user->contactNo = $request->contactNo;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->userName = $request->userName;

        $exists = User::where('email', $user->email)->first();
        if ($exists) {
            return Redirect::route('addUser')->withInput()->with('danger', 'User with email "' . $user->email . '" already exists!');
        }

        if ($user->save())
            return Redirect::route('users')->with('success', 'Successfully added user!');
        else
            return Redirect::route('addUser')->withInput()->withErrors($user->errors());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', '=', $id)->first();
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::where('id', '=', $id)->first();
        $user->firstName = $request->name;
        $user->surname = $request->surname;
        $user->user_role = $request->user_role;
        $user->institution = $request->institution;
        $user->contactNo = $request->contactNo;
        $user->email = $request->email;
        $user->userName = $request->userName;

        if ($request->password != $user->password)
            $user->password = Hash::make($request->password);

        if ($user->update())
            return Redirect::route('users')->with('success', 'Successfully updated user');
        else
            return Redirect::route('editUser', [$id])->withInput()->withErrors($user->errors());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function showLogin()
    {
        // show the form
        return view('user.login');
    }
    public function doLogin(Request $request)
    {
        // validate the credentials, create rules for the input
        $users = User::where('email', '=', $request->email)->get();

        // check if email address exists
        if ($users -> isEmpty())
            return Redirect::to('login')->withInput()->
            with('danger', 'Sorry email address or username does not exist, please register');

        foreach ($users as $user)
        {
            $rules = array(
                'email' => 'required|email',
                'password' => 'required|alphaNum|min:3');

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails())
                return Redirect::to('login')
                    ->withInput($validator)
                    ->withInput()
                    ->with('danger', 'Your login failed, Please try again.');
            else
                $userData = array(
                    'email' => $request->email,
                    'password' => $request->password);

            if (Auth::attempt($userData, true))
                return redirect('modules');
            else
                return Redirect::to('login')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('danger', 'Your login failed, Please try again');
        }
    }
    public function doLogout()
    {
        Auth::logout();
        return Redirect::to('login');
    }
}
