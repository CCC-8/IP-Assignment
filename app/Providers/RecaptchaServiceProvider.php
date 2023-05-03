<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use GoogleRecaptchaValidator\Validator as ReCaptchaValidator;
use ReCaptcha\ReCaptcha;
use Illuminate\Support\ServiceProvider;

class RecaptchaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('recaptcha', function ($attribute, $value, $parameters, $validator) {
            $secretKey = config('services.recaptcha.secret');
            $recaptcha = new ReCaptcha($secretKey);
            $response = $recaptcha->verify($value, $_SERVER['REMOTE_ADDR']);
            return $response->isSuccess();
        });

        Validator::replacer('recaptcha', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, 'The reCAPTCHA verification failed.');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
