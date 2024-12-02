<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/22
 * Time: 15:25
 */

namespace App\Http\Controllers;

use App\Services\OtpService;
use Illuminate\Http\Request;

class OTPController extends Controller
{
    protected $OtpService;

    public function __construct(OtpService $OtpService)
    {
        $this->OtpService = $OtpService;
    }

    public function sendOtp(Request $request)
    {
        $this->validate($request, [
            'mobile_number' => 'required|regex:/^[0-9]{10}$/', // Validate phone number
        ]);

        $otp = rand(100000, 999999); // Generate a 6-digit OTP
        $phoneNumber = $request->input('mobile_number');

        // Send OTP via SMS
        if ($this->OtpService->sendOtp($phoneNumber, $otp)) {
            dd('Inside if statement');
            return response()->json(['success' => true, 'otp' => $otp], 200); // In a real-world scenario, you wouldn't send the OTP back in the response.
        }

        return response()->json(['success' => false, 'message' => 'Failed to send OTP'], 400);
    }
}