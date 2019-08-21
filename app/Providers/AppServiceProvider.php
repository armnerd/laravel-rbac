<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        \DB::listen(function ($query) {
//            $params = [
//                'seq'  => config('request_seq'),
//                'sql'  => $query->sql,
//                'bindings' => $query->bindings,
//                'time' => $query->time,
//           ];
           // \Log::info(json_encode($params));
//        });
        // \URL::forceScheme('https');
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
