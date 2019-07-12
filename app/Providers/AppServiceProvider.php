<?php

namespace App\Providers;

use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Schema;
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
        //
		schema::defaultStringLength(191);


		Queue::before(function(JobProcessing $event){
			echo 'ghabl az salam donya';
		});

		Queue::after(function(JobProcessed $event){
			echo PHP_EOL."bad az salam donya";
		});
    }
}
