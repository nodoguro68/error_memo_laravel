<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * 入力された現在のパスワードとDBに登録しているユーザーのパスワードが同じかチェック
         */
        Validator::extend(
            'verify',
            function ($attribute, $value, $parameters, $validator) {
                return Hash::check($value, Auth::user()->password);
            }
        );

        /**
         * 半角英数字かチェック
         */
        Validator::extend(
            'half',
            function ($attribute, $value, $parameters, $validator) {
                return preg_match('/^[a-zA-Z0-9]+$/', $value);
            }
        );
    }
}
