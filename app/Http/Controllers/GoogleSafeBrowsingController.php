<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Google;
use Google_Service_Indexing;
use Google_Service_Indexing_UrlNotification;

class GoogleSafeBrowsingController extends AdminAccessController
{
    public function scanIndex()
    {
        return view('pages.admin.google-api.scan');
    }

    public function submitIndex()
    {
        return view('pages.admin.google-api.submit');
    }

    public function scanLink(Request $request)
    {
        $apiKey = env('GOOGLE_SAFE_BROWSING_API_KEY');
        $clientId = env('GOOGLE_SAFE_BROWSING_CLIENT_ID');
        $url = $request->input('url');

        $client = new Client();

        $response = $client->post("https://safebrowsing.googleapis.com/v4/threatMatches:find?key=$apiKey", [
            'json' => [
                'client' => [
                    'clientId' => $clientId,
                    'clientVersion' => '1.0',
                ],
                'threatInfo' => [
                    'threatEntryTypes' => ['URL'],
                    'threatEntries' => [
                        ['url' => $url],
                    ],
                ],
            ],
        ]);

        $data = json_decode($response->getBody());

        if ($this->isEmptyObject($data)) {
            return response()->json(['error' => false, 'message' => 'The URL is safe and contains no threats.']);
        } else {
            $errors = [];
            foreach ($data->matches as $match) {
                $errors[] = $match->threatType;
            }

            return response()->json(['error' => true, 'message' => 'The URL contains the following threats: ' . implode(', ', $errors)]);
        }
    }

    public function submitForIndexing(Request $request)
    {
        $url = $request->input('url');

        $indexingResponse = $this->submitToWebSearchIndexingAPI($url);

        return response()->json(['error' => false, 'message' => 'The URL has been submitted for indexing.', 'indexingResponse' => $indexingResponse]);
    }

    private function isEmptyObject($obj)
    {
        return json_encode($obj) === '{}';
    }

    private function submitToWebSearchIndexingAPI($url)
    {
        $keyFilePath = env('GOOGLE_KEY_FILE_PATH');

        $googleClient = new Google\Client();
        $googleClient->setAuthConfig($keyFilePath);
        $googleClient->setScopes(Google_Service_Indexing::INDEXING);
        $googleIndexingService = new Google_Service_Indexing($googleClient);

        $urlNotification = new Google_Service_Indexing_UrlNotification([
            'url' => $url,
            'type' => 'URL_UPDATED'
        ]);

        try {
            $result = $googleIndexingService->urlNotifications->publish($urlNotification);

            return [
                'notifyTime' => $result->urlNotificationMetadata->latestUpdate["notifyTime"],
                'type' => $result->urlNotificationMetadata->latestUpdate["type"],
                'url' => $result->urlNotificationMetadata->latestUpdate["url"],
            ];
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => $e->getMessage(),
            ];
        }
    }
}
