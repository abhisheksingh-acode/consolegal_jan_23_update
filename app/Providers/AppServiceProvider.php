<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

use App\Models\services;

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
        //
        $services = services::all();
        $data = collect();
         foreach($services as $service){
                 $service['slug'] = str_replace(' ','-',$service->name);
                 $data->push($service);
         }
        
        View::share('service_menu', $data);
    }
}
