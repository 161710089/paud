<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Validator;
use Hash;
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
                    {
                    Validator::extend('passcheck', function ($attrireturn, $value, $parameters) { 
                    return Hash::check($value, $parameters[0]);
                    });
                    }
                    view()->composer('frontend.MoreArtikel', function ($view){
                        $kategori =\App\tb_m_kategori_artikel::all();
                        // $tag=App\tb_m_tag_artikel::all();
                        $recent=\App\tb_m_artikel::orderBy('created_at','desc')->take(4)->get();
                        $view->with(compact('kategori','recent','tag'));
                    });

                    view()->composer('frontend.singleArtikel', function ($view){
                        $kategori =\App\tb_m_kategori_artikel::all();
                        // $tag=App\tb_m_tag_artikel::all();
                        $recent=\App\tb_m_artikel::orderBy('created_at','desc')->take(4)->get();
                        $view->with(compact('kategori','recent','tag'));
                    });


{
    require base_path() . '/app/Helpers/frontend.php';
}
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
