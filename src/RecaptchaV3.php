<?php 

namespace ClaudiusNascimento\RecaptchaV3;


class RecaptchaV3
{
    
    public function renderInput($action = null)
    {
        if(!$action or !is_string($action))
        {
            $action = config('recaptcha-v3.defaults.action');
        }

        return view('recaptcha-v3::input', compact('action'))->render();
    }

    public function renderJs()
    {
        return view('recaptcha-v3::script')->render();
    }

    /** 
     *  Custom validation rule
     */
    public function validate($value)
    {
        if(!config('recaptcha-v3.enable')) return true;

        $url = 'https://www.google.com/recaptcha/api/siteverify';

        $data = [

            'secret' => config('recaptcha-v3.secret_key'),
            'response' => $value
        ];

        $options = [

            'http' => [
                'header' => 'Content-type: application/x-www-form-urlencoded\r\n',
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $resultJson = json_decode($result);

        if(config('recaptcha-v3.log_result', false))
        {
            \Log::info('START Log Recaptcha V3 ================== ');
            \Log::info(json_encode($resultJson));
            \Log::info('END Log Recaptcha V3 ================== ');
        }

        return $resultJson->success;
    }
	
}


