<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/12/04
 * Time: 14:27
 */

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\OtpService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ResetPasswordController extends Controller
{
    protected $OtpService;

    public function __construct(OtpService $OtpService)
    {
        $this->OtpService = $OtpService;
    }

    // Show the password reset request form
    public function showReset()
    {
        return view('user.resetPassword');
    }

    // Send the reset link
    public function validateUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', '=', $request->email)->first();
        $otp = rand(100000, 999999);  // Generate a 6-digit OTP
        Session::put('otp', $otp);
        $this->OtpService->sendOtp($user->contactNo, $otp);

        return view('user.verify_otp');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::where('contactNo', '=', $request->mobileNo)->first();
        $user->password = Hash::make($request->password);
        $user->update();
        return Redirect::route('login')->with('success', 'Successfully updated user password');
    }
}