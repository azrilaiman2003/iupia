<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SmsGatewayService
{
    protected $apiUrl;
    protected $token;

    public function __construct()
    {
        $this->apiUrl = 'https://terminal.adasms.com/api/v1/send';
        $this->token = 'xbat6Y0iyubr6n44a7ilbgAsWF8ArQNy';
    }

    public function sendSms($phone, $message, $callbackUrl = null, $preview = null, $leadId = null, $sendAt = null)
    {
        $requestData = [
            '_token' => $this->token,
            'phone' => $phone,
            'message' => $message,
            'preview' => $preview ?? 0,
            // Add other optional parameters as needed: callback_url, lead_id, send_at
        ];

        if ($callbackUrl !== null) {
            $requestData['callback_url'] = $callbackUrl;
        }

        if ($leadId !== null) {
            $requestData['lead_id'] = $leadId;
        }

        if ($sendAt !== null) {
            $requestData['send_at'] = $sendAt;
        }

        $response = Http::post($this->apiUrl, $requestData);

        return $response->json();
    }
}
