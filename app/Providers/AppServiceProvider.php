<?php
namespace App\Providers;

use App\RecniciImena;
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
        view()->composer('partials.modal_insert', function ($view) {
            $view->with('imena_recnika', RecniciImena::pluck('recnici', 'id'));
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
