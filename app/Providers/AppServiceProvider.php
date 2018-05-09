<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        //
        $this->app->singleton('system', function(){
            $user = \Auth::user(); // gets the current user
            if(is_null($user)) {
                $system = \DB::table('systems')->find(1); // system having id = 1 is the "default" system
            }else {
                $system = \DB::table('systems')->find($user->systemID); // gets the current system
            }
            return $system; 

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
