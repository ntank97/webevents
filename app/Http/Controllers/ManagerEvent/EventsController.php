<?php

namespace App\Http\Controllers\ManagerEvent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class EventsController extends Controller
{
    public function index(Request $request){
        $events = DB::table('users')->join('events', 'users.id', '=', 'events.user_id')
        ->where('events.type','=',$request->type)
        ->orderBy('events.id','desc')
        ->select('users.name','events.*')   
        ->get();
        return view('admin.pages.tables.data',['events'=>$events]);
    }
}
