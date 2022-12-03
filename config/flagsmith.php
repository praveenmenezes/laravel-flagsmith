<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Key
    |--------------------------------------------------------------------------
    |
    | You can find your API key on your Flagsmith dashboard.
    |
    */

    'api_key' => env('FLAGSMITH_API_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | API URL
    |--------------------------------------------------------------------------
    |
    | In case of a self-hosted Flagsmith project, you can specify the custom URL
    |
    */

    'api_url' => env('FLAGSMITH_API_URL', 'https://edge.api.flagsmith.com/api/v1'),

];
