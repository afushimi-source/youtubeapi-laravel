<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GetVideoProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bindMethod(GetVideoJob::class.'@handle', function($job,$app)
      {
	    return $job->handle();
      });
    }
}
