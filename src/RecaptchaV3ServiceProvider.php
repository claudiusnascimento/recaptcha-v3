<?php namespace ClaudiusNascimento\RecaptchaV3;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use ClaudiusNascimento\RecaptchaV3\Validators\RecaptchaV3Validator;

class RecaptchaV3ServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->loadViewsFrom(__DIR__.'/views', 'recaptcha-v3');

		$this->publishes([
	        __DIR__.'/views' => base_path('resources/views/claudiusnascimento/recaptcha-v3'),
	    ], 'views');

	    $this->publishes([
		    __DIR__.'/config/recaptcha-v3.php' => config_path('recaptcha-v3.php'),
        ], 'config');

        Validator::extendImplicit('recaptcha_v3', function ($attribute, $value, $parameters, $validator) {

            return app('recaptcha-v3')->validate($value);

        });

	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->mergeConfigFrom(
		    __DIR__.'/config/recaptcha-v3.php', 'recaptcha-v3'
		);

		$this->app->singleton('recaptcha-v3', function($app)
		{
		    return new \ClaudiusNascimento\RecaptchaV3\RecaptchaV3;
		    
        });

	}

}
