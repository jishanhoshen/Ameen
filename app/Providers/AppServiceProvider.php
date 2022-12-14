<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $company = [
            'name'=> 'Ameen',
            'mail'=> 'info@ameen.com',
            'phone'=> '+8801967569642',
            'address'=> '',
            'facebook'=> 'https://facebook.comameen',
            'logo'=> 'assets/images/logo.png',
        ];
        // view()->composer(
        //     'layouts.admin',
        //     function($view){
        //         $company = [
        //             'name'=> 'Ameen',
        //             'mail'=> 'info@ameen.com',
        //             'phone'=> '+8801967569642',
        //             'address'=> '',
        //             'facebook'=> 'https://facebook.comameen',
        //             'logo'=> 'assets/images/logo.png',
        //         ];
        //         $view->with('company', $company);
        //     }
        // );
    }
}
