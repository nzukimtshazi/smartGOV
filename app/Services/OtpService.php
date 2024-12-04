<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/30
 * Time: 17:28
 */

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OtpService
{
    protected $username;
    protected $password;
    protected $apiUrl = 'https://www.winsms.co.za/api/batchmessage.asp';

    public function __construct()
    {
        $this->username = env('WINSMS_USERNAME');
        $this->password = env('WINSMS_PASSWORD');
    }

    public function sendOtp($to, $otp)
    {
        $message = "Your OTP code is: $otp";
        $response = Http::get($this->apiUrl, [
            'user' => $this->username,
            'password' => $this->password,
            'message' => $message,
            'numbers' => $to,
        ]);
        return $response->json();
    }
}