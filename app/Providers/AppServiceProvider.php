<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Page;
use App\Setting;

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
        //pega  o menu

        $frontMenu = [
            '/' => 'Home'
                

        ];

        $pages = Page ::all(); //pega todas as paginas
        foreach($pages as $page) {
         
            $frontMenu [ $page['slug'] ] = $page['title'];
            
            
        }

        //todas as informações vao ser encaminhada para o front menu aonde vou ter acesso em qualquer lugar

          
        View::share('front_menu', $frontMenu);


        //Configuraçoes

        $config =[];

        $settings = Setting::all();

        foreach($settings as $setting){

            $config[$setting['name'] ]= $setting['content'];
        }

        View::share('front_config', $config);


          

    }
}
