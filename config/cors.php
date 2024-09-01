<?php
return [

    /*
    |--------------------------------------------------------------------------
    | CORS Paths
    |--------------------------------------------------------------------------
    |
    | Specify the paths where CORS should be applied. You can use wildcard
    | patterns here, for example, "/api/*" would match all API endpoints.
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    /*
    |--------------------------------------------------------------------------
    | Allowed Methods
    |--------------------------------------------------------------------------
    |
    | These are the methods allowed when accessing your API. You can specify
    | specific methods or allow all methods using an asterisk "*".
    |
    */

    'allowed_methods' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | Allowed Origins
    |--------------------------------------------------------------------------
    |
    | These are the origins that are allowed to access your API. Specify your
    | frontend domain here. Use "*" to allow all origins. Be careful with
    | allowing all origins, as it can pose security risks.
    |
    */

    'allowed_origins' => ['http://localhost:3000', 'http://127.0.0.1:8000'],

    /*
    |--------------------------------------------------------------------------
    | Allowed Headers
    |--------------------------------------------------------------------------
    |
    | These headers are allowed when making requests to your API. You can
    | specify specific headers or use "*" to allow all headers.
    |
    */

    'allowed_headers' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | Exposed Headers
    |--------------------------------------------------------------------------
    |
    | Specify any headers that should be exposed in the response.
    |
    */

    'exposed_headers' => [],

    /*
    |--------------------------------------------------------------------------
    | Max Age
    |--------------------------------------------------------------------------
    |
    | Specify how long, in seconds, the results of a preflight request can
    | be cached by the browser.
    |
    */

    'max_age' => 0,

    /*
    |--------------------------------------------------------------------------
    | Supports Credentials
    |--------------------------------------------------------------------------
    |
    | Set this to true if your API should support credentials (cookies, etc.)
    | in requests. This is required for sanctum/csrf-cookie route.
    |
    */

    'supports_credentials' => true,

];
