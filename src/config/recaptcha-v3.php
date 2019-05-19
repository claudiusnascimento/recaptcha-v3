<?php 

return [
	
    'site_key' => env('RECAPTCHA_V3_SITE_KEY', ''),
    
    'secret_key' => env('RECAPTCHA_V3_SECRET_KEY', ''),

    'defaults' => [

        'action' => 'global' // actions may only contain alphanumeric characters and slashes
    ],

    'log_result' => false,

    'enable' => env('ENABLE_RECAPTCHA_VALIDATION', true)
];