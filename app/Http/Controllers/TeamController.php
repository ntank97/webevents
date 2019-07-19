<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Gate;
use Illuminate\Support\Facades\Validator;
use Session;

class TeamController extends Controller
{
    public function index(){
        $team = DB::table('team')->first();
        return view('admin.pages.examples.team',['team' => $team]);
    }
    public function edit(Request $request){
        if($request->_token == csrf_token()){
            if (Gate::denies('role-user', $level= 3) ) {
                $rules = [
                    'content' => 'required|min:100',
                ];
                $messages = [
                    'content.required' => 'Bạn chưa nhập tên công ty',
                    'content.min' => 'Nội dung ít nhất phải 100 ký tự'
                ];
                $validator = Validator::make($request->all(), $rules, $messages);
                if ($validator->fails()) {
                    return redirect()->route('intro')->withErrors($validator)->withInput();
                } else {
                    DB::table('team')->where('id','=',$request->id)
                    ->update([
                        'content' => $request->content,
                        'created_at' => now(),
                    ]);
                    Session::flash('success', 'Bạn sửa thông tin thành công!');
                    return redirect()->route('intro');
                }
                
            }else {
                return view('admin.pages.examples.500');
            }
        }
    }
}
