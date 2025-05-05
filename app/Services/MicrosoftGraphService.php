<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class MicrosoftGraphService
{
    protected $clientId;
    protected $clientSecret;
    protected $tenantId;
    protected $organizerEmail;

    public function __construct()
    {
        $this->clientId = config('services.microsoft.client_id');
        $this->clientSecret = config('services.microsoft.client_secret');
        $this->tenantId = config('services.microsoft.tenant_id');
        $this->organizerEmail = config('services.microsoft.organizer_email');
    }

    public function getAccessToken()
    {
        $response = Http::asForm()->post("https://login.microsoftonline.com/{$this->tenantId}/oauth2/v2.0/token", [
            'client_id' => $this->clientId,
            'scope' => 'https://graph.microsoft.com/.default',
            'client_secret' => $this->clientSecret,
            'grant_type' => 'client_credentials',
        ]);
    
        if (!$response->successful()) {
            logger()->error('Microsoft Token Error', $response->json());
            throw new \Exception('Failed to get access token.');
        }
    
        return $response->json()['access_token'];
    }
    

    public function createTeamsMeeting($subject, $startDateTime, $endDateTime, $attendees)
{
    $token = $this->getAccessToken();

    // Format attendees
    $attendeeObjects = array_map(function ($email) {
        return [
            'emailAddress' => [
                'address' => $email,
                'name' => explode('@', $email)[0],
            ],
            'type' => 'required'
        ];
    }, $attendees);

    $response = Http::withToken($token)->post("https://graph.microsoft.com/v1.0/users/{$this->organizerEmail}/events", [
        'subject' => $subject,
        'start' => [
            'dateTime' => Carbon::parse($startDateTime)->toIso8601String(),
            'timeZone' => 'Asia/Manila',
        ],
        'end' => [
            'dateTime' => Carbon::parse($endDateTime)->toIso8601String(),
            'timeZone' => 'Asia/Manila',
        ],
        'attendees' => $attendeeObjects,
        'isOnlineMeeting' => true,
        'onlineMeetingProvider' => 'teamsForBusiness',
        'body' => [
            'contentType' => 'HTML',
            'content' => 'You are invited to a Teams meeting.',
        ],
        'location' => [
            'displayName' => 'Microsoft Teams',
        ],
    ]);

    if (!$response->successful()) {
        throw new \Exception('Error creating Teams event: ' . $response->body());
    }

    return $response->json();
}

}
