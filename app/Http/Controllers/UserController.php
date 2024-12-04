<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Institution;
use App\Models\Role;
use App\Models\User;
use App\Services\OtpService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $OtpService;

    public function __construct(OtpService $OtpService)
    {
        $this->OtpService = $OtpService;
    }
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
        $districts = District::where('id', '>', 0)->get();
        $roles = Role::where('id', '>', 0)->get();
        return view('user.add', compact('districts', 'roles'));
    }

    /**
     * Ajax call to return all institutions
     *
     * @return Institution
     */

    // Fetch institutions based on district id (AJAX)
    public function getInstitutions($id)
    {
        $institutions = Institution::where('district_id', $id)->get();
        return response()->json($institutions);  // Return as JSON for AJAX
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exists = User::where('email', $request->email)->first();
        if ($exists) {
            return Redirect::route('addUser')->withInput()->with('danger', 'User with email "' . $request->email . '" already exists!');
        }

        $filename = '';
        if ($request->hasFile('image')) {
            $filename = $request->getSchemeAndHttpHost() . '/images/' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('/images/'), $filename);
        }
        // Storing the file path
        Session::put('uploaded_file_path', $filename);

        $district = District::find($request->district);
        $institution = Institution::find($request->institution);
        $role = Role::find($request->role_id);
        // Storing user data
        $request->session()->put('user_data', [
            'firstName' => $request->fname,
            'lastName' => $request->lname,
            'contactNo' => $request->mobile_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'userName' => $request->userName,
            'image_path' => $filename,
            'district' => $district->name,
            'institution' => $institution->name,
            'user_role' => $role->description,
        ]);

        $otp = rand(100000, 999999);  // Generate a 6-digit OTP
        Session::put('otp', $otp);
        $this->OtpService->sendOtp($request->mobile_number, $otp);

        return view('user.verify_otp');
    }

    // Show OTP Form
    public function showOtpForm()
    {
        return view('user.verify_otp');
    }

    // Verify OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        if ($request->otp == Session::get('otp')) {
            $user_data = $request->session()->get('user_data');;

            $user = new User();
            $user->firstName = $user_data['firstName'];
            $user->lastName = $user_data['lastName'];
            $user->contactNo = $user_data['contactNo'];
            $user->email = $user_data['email'];
            $user->password = $user_data['password'];
            $user->userName = $user_data['userName'];
            $user->image_path = $user_data['image_path'];
            $user->district = $user_data['district'];
            $user->institution = $user_data['institution'];
            $user->user_role = $user_data['user_role'];
            $user->save();
            return Redirect::route('users')->with('success', 'Successfully added a user');
        } else {
            return Redirect::route('showForm')->withErrors(['otp' => 'Invalid OTP']);
        }
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
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $users = User::where('id', '>', 0)->get();
        $userCount = $users->count();

        $user =User::select('user_role', DB::raw('count(*) as count'))
            ->groupBy('user_role')
            ->get();

        return view('user.editor', compact('users', 'userCount', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $user = User::where('id', '=', $id)->first();
        return response()->json(['data' => $user]);
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
