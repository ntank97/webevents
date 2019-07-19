<?php

namespace App\Http\Controllers\Interfaces;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
    public function index(Request $request){
        // $slider = DB::table('images')->where('type','=',1)->offset(0)->limit(3)->get();
        $events = DB::table('events')->where([['type','=',1],['status','!=',0]])->offset(0)->limit(3)->inRandomOrder()->orderBy('id','desc')->get();
        $device = DB::table('events')->where([['type','=',3],['status','!=',0]])->offset(0)->limit(12)->inRandomOrder()->orderBy('id','desc')->get();
        $staff = DB::table('events')->where([['type','=',2],['status','!=',0]])->offset(0)->limit(3)->inRandomOrder()->orderBy('id','desc')->get();
        $evented = DB::table('events')->where([['type','=',1],['end_day','<',now()],['status','!=',0]])->offset(0)->limit(3)->inRandomOrder()->orderBy('id','desc')->get();
        $custommer = DB::table('custommer')->where('status','!=',0)->offset(0)->limit(3)->inRandomOrder()->orderBy('id','desc')->get();
       
       
        $devices = DB::table('events')->where([['type','=',3],['status','!=',0]])->offset(0)->limit(12)->inRandomOrder()->orderBy('id','desc')->get();
        //3dv moi nhat
        $newEvent = DB::table('events')->where([['type','=',1],['status','!=',0]])->orderBy('id','desc')->offset(0)->limit(3)->inRandomOrder()->get();
        
        // $eventsList = DB::table('events')->where([['type','=',1],['status','!=',0]])->orderBy('id','desc')->get();
        // $deviceList = DB::table('events')->where([['type','=',1],['status','!=',0]])->orderBy('id','desc')->get();
        // $staffList = DB::table('events')->where([['type','=',1],['status','!=',0]])->orderBy('id','desc')->get();
        //partner
        $partner = DB::table('partner')->orderBy('id','desc')->get();
        $videoIntro = DB::table('images')->where('type','=',2)->first();
        
        return view('pages.trangchu',[
            'events' => $events,
            'devices' => $device,
            'staff' => $staff,
            'evented' => $evented,
            'custommer' => $custommer,
            'videoIntro' => $videoIntro,
            'partner' =>$partner
        ]);
    }
    public function intro(Request $request){
        $introduce = DB::table('introduce')->first();
        return view('pages.about',compact('introduce'));
    }
    public function event(Request $request){
        $eventstc = DB::table('events')->where([['type','=',1],['status','!=',0]])->orderBy('id','desc')->paginate(20);
        return view('pages.sukien',compact('eventstc'));
    }
    public function evented(Request $request){
        $eventstc = DB::table('events')->where([['type','=',1],['status','!=',0],['end_day','<',now()]])->orderBy('id','desc')->paginate(20);
        return view('pages.sukien',compact('eventstc'));
    }
    public function device(Request $request){
        $eventstc = DB::table('events')->where([['type','=',3],['status','!=',0]])->orderBy('id','desc')->paginate(20);
        return view('pages.thietbi',compact('eventstc'));
    }
    public function staff(Request $request){
        $eventstc = DB::table('events')->where([['type','=',2],['status','!=',0]])->orderBy('id','desc')->paginate(20);
        return view('pages.nhansu',compact('eventstc'));
    }
    public function news(Request $request){
        
        $blogss = DB::table('users')->join('blog', 'users.id', '=', 'blog.user_id')->orderBy('blog.id','desc')->paginate(20);
        return view('pages.tintuc',compact('blogss'));
    }
    public function team(Request $request){
        $team = DB::table('team')->first();
        return view('pages.team',compact('team'));
    }
    public function contact(Request $request){
        $contact = DB::table('contacts')->first();
        return view('pages.lienhe',compact('contact'));
    }
    //detail
    public function detail(Request $request){
        
        if($request){
            $dataDetail = DB::table('users')->join('events', 'users.id', '=', 'events.user_id')->where('slug','=',$request->slug)->first();
            // dd($dataDetail);
            return view('pages.detai',compact('dataDetail'));
        }else {
            return view('admin.pages.examples.404');
        }
    }
    // public function detailPersonnel(Request $request){
    //     if($request){
    //         $dataDetail = DB::table('users')->join('events', 'users.id', '=', 'events.user_id')->where('slug','=',$request->slug)->first();
    //         return view('pages.detai',compact('dataDetail'));
    //     }else {
    //         return view('admin.pages.examples.404');
    //     }
    // }
    // public function detailDevice(Request $request){
    //     if($request){
    //         $dataDetail = DB::table('users')->join('events', 'users.id', '=', 'events.user_id')->where('slug','=',$request->slug)->first();
    //         return view('pages.detai',compact('dataDetail'));
    //     }else {
    //         return view('admin.pages.examples.404');
    //     }
    // }
    public function detailBlog(Request $request){
        $detailBlog = DB::table('users')->join('blog', 'users.id', '=', 'blog.user_id')->where('slug','=',$request->slug)->first();
        return view('pages.detailBlog',compact('detailBlog'));
    }
}
