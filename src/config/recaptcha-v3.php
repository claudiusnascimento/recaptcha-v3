<?php 

return [
	
    'site_key' => '6Lco7Z0UAAAAAMjcjkY9n2YZXoYjVjfKCSS5aFDo',
    
    'secret_key' => '6Lco7Z0UAAAAAB9cTYMeilRqmiGleOcD-fArB9cx',

    'defaults' => [

        'action' => 'global' // actions may only contain alphanumeric characters and slashes
    ],

    'log_result' => false,

    'enable' => env('ENABLE_RECAPTCHA_VALIDATION', true)
];