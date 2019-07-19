<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UploadRequest;
use Image;
use File;
use Session;
use Illuminate\Support\Facades\Auth;
use Gate;

class CustommerController extends Controller
{
    public function index(Request $request){
        $custommer = DB::table('custommer')->get();
        return view('admin.pages.examples.custommer',['custommer' => $custommer]);
    }
   //add
    public function add(Request $request){
        return view('admin.pages.examples.addCustommer');
    }
    //add data
    public function addData(Request $request){
        if($request->_token == csrf_token()){
            $rules = [
                'name' =>'required|min:3|max:255',
                'comment' => 'required|min:100',
                'img_cover' => 'required',
            ];
            $messages = [
                'name.required' => 'Bạn chưa nhập tiêu đề cho sự kiện',
                'name.min' => 'Tiêu đề ít nhất 3 ký tự',
                'name.max' => 'Tiêu đề không vượt quá 255 ký',
                'content.required' => 'Bạn chưa nhập nội  dung',
                'content.min' => 'Nội dung ít nhất phải 100 ký tự',
                'img_cover.required' => 'Bạn chưa chọn ảnh nền',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return redirect()->route('custommer-add')->withErrors($validator)->withInput();
            } else {
                // dd($request);
                $img = $request->img_cover;
                $fileName = $request->img_cover->getClientOriginalName();
                DB::table('custommer')->insert([
                    'slug' => $this->slug($request->name,time()),
                    'name' => $request->name,
                    'work' => $request->work,
                    'avatar' => $fileName,
                    'comment' => $request->comment,
                    'status' => 0,
                    'created_at' => now(),
                ]);
                if($img->getClientOriginalExtension('img_cover') == "jpg"||$img->getClientOriginalExtension('img_cover') == "png"){
                    $img->move('admin/img',$fileName);
                }else{
                    Session::flash('error', 'Sai đinh dạng ảnh :((');
                    return redirect()->route('custommer-add');
                };
                Session::flash('success', 'Bạn vừa mới thêm thành công!');
                return redirect()->route('custommer-index');
            }
        }
    }
    //edit
    public function edit(Request $request){
        $custommer = DB::table('custommer')->where('slug','=',$request->slug)->first();
        // dd($blog);
        return view('admin.pages.examples.editCustommer',['custommer'=>$custommer]);
    }
    //edit data
    public function editData(Request $request){
        if($request->_token == csrf_token()){
            
            if ( $request->status == 0 || Gate::denies('role-user', $level= 3) ) {
                $rules = [
                    'name' =>'required|min:3|max:255',
                    'comment' => 'required|min:100'
                ];
                $messages = [
                    'name.required' => 'Bạn chưa nhập tiêu đề cho sự kiện',
                    'name.min' => 'Tiêu đề ít nhất 3 ký tự',
                    'name.max' => 'Tiêu đề không vượt quá 255 ký',
                    'content.required' => 'Bạn chưa nhập nội  dung',
                    'content.min' => 'Nội dung ít nhất phải 100 ký tự'
                ];
                $validator = Validator::make($request->all(), $rules, $messages);
                if ($validator->fails()) {
                    // dd($request);
                    return redirect()->route('custommer-edit',['slug'=>$request->slug])->withErrors($validator)->withInput();
                } else {
                
                    $imgCurrent = DB::table('custommer')->where('id','=',$request->id)->first()->avatar;
                    $img = $request->img_cover;
                    if($img != null){
                        $fileName = $request->img_cover->getClientOriginalName();
                        if($img->getClientOriginalExtension('img_cover') == "jpg"||$img->getClientOriginalExtension('img_cover') == "png"){
                            $img->move('admin/img',$fileName);
                            if(File::exists('admin/img/'.$imgCurrent)){
                                File::delete('admin/img/'.$imgCurrent);
                            }
                        }else{
                            Session::flash('error', 'Sai đinh dạng ảnh :((');
                            return redirect()->route('custommer-edit',['slug'=>$request->slug]);
                        };
                    }else {
                        $fileName = $imgCurrent;
                    }
                    // dd($request->id);
                    DB::table('custommer')->where('id','=',$request->id)
                    ->update([
                        'slug' => $this->slug($request->name,time()),
                        'name' => $request->name,
                        'work' => $request->work,
                        'avatar' => $fileName,
                        'comment' => $request->comment,
                        'status' => 0,
                        'updated_at' => now(),
                    ]);
                    Session::flash('success', 'Bạn sửa thông tin thành công!');
                    return redirect()->route('custommer-index');
                }
            }else {
                return view('admin.pages.examples.500');
            }
        }
    }
    //delete
    public function deleteData(Request $request){
        if($request->_token == csrf_token()){
            if (Gate::denies('role-user', $level= 3)) {
                DB::table('custommer')->where('id', '=', $request->id)->delete();
                return response()->json([
                    'success' => 'Bạn đã xóa thành công!'
                ],200);
            }else {
                return response()->json([
                    'success' => 'Bạn không có quyền để thực hiện chức năng này!'
                ],500);
            }
        }
    }
    //chang status of custommer
    public function changeStatusData(Request $request){
        if($request->_token == csrf_token()){
            DB::table('custommer')->where('id', '=', $request->id)->update([
                'status' => $request->status,
                'updated_at' => now(),
            ]);
            return response()->json([
                'success' => 'Bạn đã thay đổi thành công'
            ],200);
        }
    }
}
