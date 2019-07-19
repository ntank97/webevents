<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Gate;
use Illuminate\Support\Facades\Validator;
use Session;

class ContactController extends Controller
{
    public function index(){
        $contact = DB::table('contacts')->first();
        return view('admin.pages.examples.contact',['contact' => $contact]);
    }
    public function edit(Request $request){
        if($request->_token == csrf_token()){
            if (Gate::denies('role-user', $level= 3) ) {
                $rules = [
                    'content' => 'required|min:100',
                    'name' => 'required',
                    'address' => 'required',
                    'store' => 'required',
                    'phone' => 'required',
                    'email' => 'required',
                    'site' => 'required',
                ];
                $messages = [
                    'name.required' => 'Bạn chưa nhập tên công ty',
                    'title.min' => 'Tiêu đề ít nhất 3 ký tự',
                    'title.max' => 'Tiêu đề không vượt quá 255 ký',
                    'content.required' => 'Bạn chưa nhập nội  dung',
                    'content.min' => 'Nội dung ít nhất phải 100 ký tự',
                    'address.required' => 'Bạn chưa nhập địa chỉ',
                    'store.required' => 'Bạn chưa nhập địa chỉ kho hàng',
                    'phone.required' => 'Bạn chưa nhập số điện thoại',
                    'email.required' => 'Bạn chưa nhập email',
                    'site.required' => 'Bạn chưa nhập website',

                ];
                $validator = Validator::make($request->all(), $rules, $messages);
                if ($validator->fails()) {
                    // dd($request);
                    return redirect()->route('contact')->withErrors($validator)->withInput();
                } else {
                    DB::table('contacts')->where('id','=',$request->id)
                    ->update([
                        'content' => $request->content,
                        'name_company' => $request->name,
                        'address' => $request->address,
                        'store' => $request->store,
                        'phone' => $request->phone,
                        'email' => $request->email,
                        'site' => $request->site,
                        'created_at' => now(),
                    ]);
                    Session::flash('success', 'Bạn sửa thông tin thành công!');
                    return redirect()->route('contact');
                }
                
            }else {
                return view('admin.pages.examples.500');
            }
        }
    }
}
