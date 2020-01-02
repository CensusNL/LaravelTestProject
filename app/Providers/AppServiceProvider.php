<?php

namespace App\Providers;

use Maatwebsite\Excel\Facades\Excel;
use App\Jobs\ProcessExcel;
use Illuminate\Support\ServiceProvider;

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
        $this->app->bindMethod(ProcessExcel::class . '@handle', function ($job, $app) {
            return $job->handle($app->make(Excel::class));
        });
    }

}
