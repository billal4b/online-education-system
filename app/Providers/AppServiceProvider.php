<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use App\Content;

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
      Schema::defaultStringLength(191);
      
      View::share('footer1', Content::where('is_active',1)->where('section_name', 'Footer One')->first());
      View::share('footer2', Content::where('is_active',1)->where('section_name', 'Footer Two')->first());
      
      //  if(env('APP_DEBUG')){
      //   DB::listen(function ($query){
      //     File::append(
      //       storage_path('logs/queries-'.Carbon::today()->toDateString().'.log'),
      //       '/'.Request::path() . ' ### (' . $query->sql . ') [' . implode(', ', $query->bindings) . ']' . ' - at ' . Carbon::now()->toTimeString() . PHP_EOL
      //     );
      //   });
      // }

    }
}
