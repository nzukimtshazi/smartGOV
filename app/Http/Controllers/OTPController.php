<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/22
 * Time: 15:25
 */

namespace App\Http\Controllers;

use Twilio\Rest\Client;

class OTPController extends Controller
{
    public function generateOTP($length = 6)
    {
        $otp = '';
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $otp .= $characters[rand(0, $charactersLength - 1)];
        }
        return $otp;
    }

    public function sendOtpToMobile($mobileNumber)
    {
        $otp = $this->generateOTP(); // Generate OTP

        // Twilio credentials from the config
        $sid = config('services.twilio.sid');
        $authToken = config('services.twilio.auth_token');
        $twilioPhoneNumber = config('services.twilio.phone_number');

        $client = new Client($sid, $authToken);
        $mobileNo = preg_replace('/^0/', '+27', $mobileNumber);
        $fromNo = preg_replace('/^0/', '+27', $twilioPhoneNumber);

        try {
            // Send SMS using Twilio API
            $message = $client->messages->create(
                $mobileNo, // The recipient's phone number
                [
                    'from' => $fromNo, // Your Twilio phone number
                    'body' => 'Your OTP is: ' . $otp, // Message content
                ]
            );

            // Optionally, save the OTP to the database, associated with the user's phone number for verification later.
            return $otp; // You can store this OTP for later comparison
        } catch (\Exception $e) {
            // Handle errors, such as invalid phone numbers or API issues
            return response()->json(['error' => 'Failed to send OTP: ' . $e->getMessage()]);
        }
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'phone_number' => 'required',
            'otp' => 'required|numeric',
        ]);

        // Fetch OTP from database
        $otpRecord = Otp::where('phone_number', $request->phone_number)
            ->where('otp', $request->otp)
            ->where('expires_at', '>', now()) // Ensure OTP has not expired
            ->first();

        if ($otpRecord) {
            // OTP is valid
            return response()->json(['message' => 'OTP verified successfully']);
        } else {
            // OTP is invalid or expire
            return response()->json(['error' => 'Invalid or expired OTP'], 400);
        }
    }

    public function storeOtp($phoneNumber, $otp)
    {
        // Store OTP with expiration time (e.g., 10 minutes)
        Otp::create([
            'phone_number' => $phoneNumber,
            'otp' => $otp,
            'expires_at' => now()->addMinutes(10),
        ]);
    }
}