<?php
/**
 * Created by PhpStorm.
 * User: Nzuki
 * Date: 2024/11/30
 * Time: 17:28
 */

namespace App\Services;

use GuzzleHttp\Client;

class OtpService
{
    protected $client;
    protected $apiUrl;
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiUrl = 'https://api.winsms.co.za/api/smsSend';
        $this->username = env('WINSMS_USERNAME'); // Store in .env
        $this->password = env('WINSMS_PASSWORD'); // Store in .env
    }

    public function sendOtp($phoneNumber, $otp)
    {
        $message = "Your OTP is: $otp";

        try {
            $response = $this->client->post($this->apiUrl, [
                'form_params' => [
                    'username' => $this->username,
                    'password' => $this->password,
                    'api_key' => env('WINSMS_API_KEY'),
                    'to' => $phoneNumber,
                    'message' => $message,
                    'from' => 'YourApp', // Sender ID
                ]
            ]);

            $responseBody = json_decode($response->getBody()->getContents(), true);

            if ($responseBody['status'] == 'success') {
                return true;
            }

            return false;

        } catch (\Exception $e) {
            // Handle errors
            return false;
        }
    }
}