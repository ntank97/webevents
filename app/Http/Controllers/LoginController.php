<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Validator;
use Session;

class LoginController extends Controller
{
    public function login(){
        Auth::logout();
        return view('admin.pages.examples.login');
    }
    public function check(Request $request){
        // // echo csrf_token();
        // dd($request);
        // dd($request);
        // if($request->_token == csrf_token()){
            if(Auth::check()){
                // dd('tồn tại');
                
                return redirect()->route('home');
            }else {
                echo 'khong ton tai account';
                $rules = [
                    'name' =>'required|min:3|max:191',
                    'pass' => 'required|min:3',
                ];
                $messages = [
                    'name.required' => 'Bạn chưa nhập thông tin user',
                    'name.min' => 'Tên tài khoản ít nhất là 3 ký tự',
                    'name.max' => 'Tên tài khoản không được vượt quá 191 ký tự',
                    'pass.required' => 'Bạn chưa nhập mật khẩu',
                    'pass.min' => 'Mật khẩu phải chứa ít nhất 3 ký tự',
                ];
                $validator = Validator::make($request->all(), $rules, $messages);
                if ($validator->fails()) {
                    // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
                    return redirect('admincp/logins')->withErrors($validator)->withInput();
                } else {
                    // dd($request);
                    if(Auth::attempt(['name'=>$request->name,'password'=>$request->pass],$request->has('remember'))){
                        // dd('stop');
                        return redirect()->route('home');
                    }else {
                        Session::flash('error', 'Mật khẩu hoặc tài khoản không chính xác :((');
                        return redirect()->route('logins');
                    }
                }
            }
        // }
    }
}
