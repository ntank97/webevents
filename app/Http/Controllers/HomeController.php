<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class HomeController extends Controller
{
    public function index(){
        if(Auth::check()){
			$events = DB::table('events')->where('type','=',1)->orderBy('id','desc')->offset(0)->limit(4)->get();
			$staff = DB::table('events')->where('type','=',2)->orderBy('id','desc')->offset(0)->limit(4)->get();
			$device = DB::table('events')->where('type','=',3)->orderBy('id','desc')->offset(0)->limit(4)->get();
			$video = DB::table('images')->where('type','=',2)->first();
			$partner = DB::table('partner')->offset(0)->limit(7)->get();
			$blogs = DB::table('users')->join('blog', 'users.id', '=', 'blog.user_id')->offset(0)->limit(7)->get();

			$countEvent = DB::table('events')->where([['type','=',1],['status','=',1]])->count();
			$countEventPending = DB::table('events')->where([['type','=',1],['status','=',0]])->count();
			$countEventDeative = DB::table('events')->where([['type','=',1],['end_day','<',now()],['status','!=',0]])->count();
			
			$countStaff = DB::table('events')->where([['type','=',2],['status','=',1]])->count();
			$countStaffPending = DB::table('events')->where([['type','=',2],['status','=',0]])->count();
			$countDevice = DB::table('events')->where([['type','=',3],['status','=',1]])->count();
			$countDevicePending = DB::table('events')->where([['type','=',3],['status','=',0]])->count();
			// $total = DB::table('events')->where('status','=',1)->count();
			$totalBlog = DB::table('blog')->where('status','=',1)->count();
			$totalComment = DB::table('custommer')->where('status','=',1)->count();
			return view('admin.index',[
				'events' => $events,
				'staff' => $staff,
				'device' => $device,
				'video' => $video,
				'countEvent' => $countEvent,
				'countEventPending' => $countEventPending,
				'countEventDeactive' => $countEventDeative,
				'countStaff' => $countStaff,
				'countStaffPending' => $countStaffPending,
				'countDevice' => $countDevice,
				'countDevicePending' => $countDevicePending,
				'partner' => $partner,
				'blogs' => $blogs,
				'totalBlog' => $totalBlog,
				'totalComment' => $totalComment,
			]);
		}else {
			return redirect()->route('logins');
		}
        // return view('admin.index');
    }
    public  function logout(){
        Auth::logout();
        return redirect()->route('logins');
    }
}
