<?php

namespace App\Http\Controllers\ManagerProfile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate;
use DB;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Facades\Auth;
use Image;
use File;


class ProfileAdminController extends Controller
{
    public function index(Request $request){
        if (Gate::denies('role-user', $level= 3)) {
            $admin = DB::table('users')->where('id','=',Auth::user()->id)->first();
            // dd($admin);
            $blogs = DB::table('users')->join('blog', 'users.id', '=', 'blog.user_id')->where('blog.status','=',0)->get();
            $custommer = DB::table('custommer')->where('status','=',0)->get();
            $countEvent = DB::table('events')->where([['type','=',1],['status','=',0]])->count();
            $countStaff = DB::table('events')->where([['type','=',2],['status','=',0]])->count();
            $countDevice = DB::table('events')->where([['type','=',3],['status','=',0]])->count();
            $countEditor = DB::table('users')->where('level','=',2)->count();
            $countUsers = DB::table('users')->where('level','=',3)->count();
            $users = DB::table('users')->where('level','!=',1)->get();
            if ($request->has('type')) {
                if($request->type == 0){
                    $eventsPending =DB::table('users')->join('events', 'users.id', '=', 'events.user_id')
                    ->where('events.status','=',0)
                    ->get();
                    // dd($eventsPending);
                }else {
                    $eventsPending = DB::table('users')->join('events', 'users.id', '=', 'events.user_id')
                    ->where([
                        ['events.status','=',0],
                        ['events.type','=',$request->type]
                    ])
                    ->get();
                }
                
            }else{
                $eventsPending =DB::table('users')->join('events', 'users.id', '=', 'events.user_id')
                ->where('events.status','=',0)
                ->get();
            }
            return view('admin.pages.examples.profile',[
                'users' => $users,
                'countEvent' => $countEvent,
                'countStaff' => $countStaff,
                'countDevice' => $countDevice,
                'countEditor' => $countEditor,
                'countUsers' => $countUsers,
                'eventsPending' => $eventsPending,
                'blogs' => $blogs,
                'custommer' => $custommer,
                'admin' => $admin
            ]);
        }else {
            return view('admin.pages.examples.500');
        }
        
    }
    public function addUser(Request $request){
        if($request->_token == csrf_token()){
            $rules = [
                'name' =>'required|min:3|max:191',
                'pass' => 'required|min:3',
                'repass' => 'required|same:pass',
                'level' => 'required',
                'file' => 'required',
            ];
            $messages = [
                'name.required' => 'Bạn chưa nhập thông tin user',
                'name.min' => 'Tên tài khoản ít nhất là 3 ký tự',
                'name.max' => 'Tên tài khoản không được vượt quá 191 ký tự',
                'pass.required' => 'Bạn chưa nhập mật khẩu',
                'pass.min' => 'Mật khẩu phải chứa ít nhất 3 ký tự',
                'repass.required' => 'Bạn chưa xác nhận mật khẩu',
                'repass.same' => 'Xác nhận mật khẩu không chính xác',
                'level.required' => 'Bạn chưa chọn quyền cho user',
                'file.required' => 'Bạn chưa chọn ảnh đại diện',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
                return redirect('admincp/profile-admin')->withErrors($validator)->withInput();
            } else {
                $img = $request->file;
                $fileName = $request->file->getClientOriginalName();
                if($img->getClientOriginalExtension('file') == "jpg"||$img->getClientOriginalExtension('file') == "png"){
                    $img->move('admin/img',$fileName);
                }else{
                    Session::flash('error', 'Sai đinh dạng ảnh :((');
                    return redirect()->route('profile');
                };
                DB::table('users')->insert([
                    'name' => $request->name,
                    'password' => bcrypt($request->pass),
                    'level' => $request->level,
                    'avatar' => $fileName,
                    'created_at' => now(),
                ]);
                Session::flash('success', 'Bạn đã thêm user thành công!');
                // return redirect()->route('add')->with('thongbao','Sai định dạng ảnh');
                return redirect()->route('profile');
                // {!!route('profile',['type'=>1])!!}
            }
        }
    }
    public function showUser(Request $request){
        if($request->has('id')){
            $user = DB::table('users')->where('id','=',$request->id)->first();
            if($user){
                return response()->json([
                    'user' => $user
                ],200);
            }else {
                return response()->json([
                    'messge' => 'fail'
                ],500);
            }
            
        }
    }
    public function changeUser(Request $request){
        $rules = [
            'name' =>'required|min:3|max:191',
            'pass' => 'required|min:3|max:191',
            'repass' => 'max:191',
            'cfpass' => 'same:repass',
            'level' => 'required'
        ];
        $messages = [
            'name.required' => 'Bạn chưa nhập thông tin user',
            'name.min' => 'Tên tài khoản ít nhất là 3 ký tự',
            'name.max' => 'Tên tài khoản không được vượt quá 191 ký tự',
            'pass.required' => 'Bạn chưa nhập mật khẩu',
            'pass.min' => 'Mật khẩu phải chứa ít nhất 3 ký tự',
            'pass.max' => 'Mật khẩu không được quá 191 ký tự',
            'repass.min' => 'Mật khẩu mới chứa ít nhất 3 ký tự',
            'repass.max' => 'Mật khẩu mới không được quá 3 ký tự',
            'cfpass.same' => 'Xác nhận mật khẩu không chính xác',
            'level.required' => 'Bạn chưa chọn quyền cho user',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect('admincp/profile-admin')->withErrors($validator)->withInput();
        } else {
            // dd($request);
            // DB::table('users')->where('id', '=', $request->id_user)->delete();
            $imgCurrent = DB::table('users')->where('id','=',$request->id_user)->first()->avatar;
            $img = $request->file;
            if($img != null){
                $fileName = $request->file->getClientOriginalName();
                if($img->getClientOriginalExtension('file') == "jpg"||$img->getClientOriginalExtension('file') == "png"){
                    $img->move('admin/img',$fileName);
                    if(File::exists('admin/img/'.$imgCurrent)){
                        File::delete('admin/img/'.$imgCurrent);
                    }
                }else{
                    Session::flash('error', 'Sai đinh dạng ảnh :((');
                    return redirect()->route('profile');
                };
            }else {
                $fileName = $imgCurrent;
            }
            // dd($request->id);
            if($request->repass != null){
                DB::table('users')->where('id','=',$request->id_user)
                ->update([
                    'name' => $request->name,
                    'password' => bcrypt($request->repass),
                    'avatar' => $fileName,
                    'level'=>$request->level,
                    'updated_at' => now()
                ]);
            }else {
                DB::table('users')->where('id','=',$request->id_user)
                ->update([
                    'name' => $request->name,
                    'avatar' => $fileName,
                    'level'=>$request->level,
                    'updated_at' => now()
                ]); 
            }
            
            // DB::table('users')
            // ->where('id','=',$request->id_user)
            // ->update(['name' => $request->name,'password' => bcrypt($request->repass),'level'=>$request->level,'updated_at' => now()]);
            Session::flash('success', 'Bạn đã cập nhật user thành công!');
            return redirect('admincp/profile-admin');
        }
    }
    public function deleteUser(Request $request){
        if($request->_token == csrf_token()){
            DB::table('users')->where('id', '=', $request->id)->delete();
            return response()->json([
                'success' => 'Bạn đã xóa thành công!'
            ],200);
        }
    }
    // get data for to chuc su kien
    public function getDataEvent(){
        return view('admin.pages.tables.data');
    }
    //change status of event
    public function changStatus(Request $request){
        if($request->_token == csrf_token()){
            DB::table('events')->where('id', '=', $request->id)->update([
                'status' => $request->status,
                'updated_at' => now(),
            ]);
            return response()->json([
                'success' => 'Bạn đã cập nhật thành công!'
            ],200);
        }
    }
}
