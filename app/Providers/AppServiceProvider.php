<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Auth;
use Illuminate\Support\Facades\Schema;
use DB;


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
        if(!\App::runningInConsole()){
            $newEvent = DB::table('events')->where([['type','=',1],['status','!=',0]])->orderBy('id','desc')->offset(0)->limit(3)->inRandomOrder()->get();
            View::share('newEvent', $newEvent);
            $blogs = DB::table('blog')->where('status','!=',0)->offset(0)->limit(10)->orderBy('id','desc')->get();
            View::share('blogs', $blogs);
            $eventsList = DB::table('events')->where([['type','=',1],['status','!=',0]])->orderBy('id','desc')->get();
            View::share('eventList', $eventsList);
            $deviceList = DB::table('events')->where([['type','=',3],['status','!=',0]])->orderBy('id','desc')->get();
            View::share('deviceList', $deviceList);
            $staffList = DB::table('events')->where([['type','=',2],['status','!=',0]])->orderBy('id','desc')->get();
            View::share('staffList', $staffList);

            $slider = DB::table('images')->where('type','=',1)->offset(0)->limit(3)->get();
            View::share('slider', $slider);
            $contact = DB::table('contacts')->first();
            View::share('contact', $contact);

            $events = DB::table('events')->where([['type','=',1],['status','!=',0]])->offset(0)->limit(5)->inRandomOrder()->orderBy('id','desc')->get();
            $device = DB::table('events')->where([['type','=',3],['status','!=',0]])->offset(0)->limit(5)->inRandomOrder()->orderBy('id','desc')->get();
            $staff = DB::table('events')->where([['type','=',2],['status','!=',0]])->offset(0)->limit(5)->inRandomOrder()->orderBy('id','desc')->get();
            View::share('eventFooter', $events);
            View::share('deviceFooter', $device);
            View::share('staffFooter', $staff);
            
            /// count admin
            $countAdminEvent = DB::table('events')->where([['type','=',1],['status','=',0]])->get();
            $countAdminDevice = DB::table('events')->where([['type','=',3],['status','=',0]])->get();
            $countAdminStaff = DB::table('events')->where([['type','=',2],['status','=',0]])->get();
            $countAdminBlog = DB::table('blog')->where('status','=',0)->get();
            $countAdminComment = DB::table('custommer')->where('status','=',0)->get();
            View::share('countAdminEvent', $countAdminEvent);
            View::share('countAdminDevice', $countAdminDevice);
            View::share('countAdminStaff', $countAdminStaff);
            View::share('countAdminBlog', $countAdminBlog);
            View::share('countAdminComment', $countAdminComment);

            $logo = DB::table('images')->where('type','=',3)->first();
            View::share('logo', $logo);

        }
    }
}
