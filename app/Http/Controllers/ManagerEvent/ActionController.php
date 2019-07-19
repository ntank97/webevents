<?php

namespace App\Http\Controllers\ManagerEvent;

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

class ActionController extends Controller
{
    public function addView(){
        
        return view('admin.pages.examples.add');
    }
    public function add(Request $request){
        if($request->_token == csrf_token()){
            $post_user = Auth::user()->name;
            $rules = [
                'title' =>'required|min:3|max:191',
                'content' => 'required|min:100',
                'img_cover' => 'required',
                'start_time' => 'date|before:end_time',
                'end_time' => 'date|after:start_time',
            ];
            $messages = [
                'title.required' => 'Bạn chưa nhập tiêu đề cho sự kiện',
                'title.min' => 'Tiêu đề ít nhất 3 ký tự',
                'title.max' => 'Tiêu đề không vượt quá 255 ký',
                'content.required' => 'Bạn chưa nhập nội  dung',
                'content.min' => 'Nội dung ít nhất phải 100 ký tự',
                'img_cover.required' => 'Bạn chưa chọn ảnh nền',
                'start_time.date' => 'Băt buộc phải là kiểu thời gian',
                'start_time.before' => 'Thời bắt đầu phải trước thời gian kết thúc',
                'end_day.date' => 'Băt buộc phải là kiểu thời gian',
                'end_time.after' => 'Thời gian kết thúc phải sau thời gian bắt đầu',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
                // return redirect()->route('add',['type'=>$category])->with('thongbao','Bạn chưa chọn hãng sản phẩm');
                return redirect()->route('managerAdd',['type'=>$request->type,'post-user' => $post_user])->withErrors($validator)->withInput();
            } else {
                // dd($request);
                $img = $request->img_cover;
                $fileName = $request->img_cover->getClientOriginalName();
                DB::table('events')->insert([
                    'photo_cover' => $fileName,
                    'title' => $request->title,
                    'slug' => $this->slug($request->title,time()),
                    'content' => $request->content,
                    'type' => $request->type,
                    'user_id' => $request->user_id,
                    'status' => 0,
                    'start_day' => $request->start_time,
                    'end_day' => $request->end_time,
                    'created_at' => now(),
                ]);
                

                // Session::flash('success', 'Bạn đã thêm user thành công!');
                // return redirect()->route('add')->with('thongbao','Sai định dạng ảnh');
                if($img->getClientOriginalExtension('img_cover') == "jpg"||$img->getClientOriginalExtension('img_cover') == "png"){
                    $img->move('admin/img',$fileName);
                }else{
                    Session::flash('success', 'Sai đinh dạng ảnh :((');
                    return redirect()->route('managerAdd',['type'=>$request->type,'post-user' => $post_user]);
                };
                Session::flash('success', 'Bạn vừa mới thêm một sự kiên thành công!');
                return redirect()->route('events',['type'=>$request->type]);
            }
        }
    }
    public function editView(Request $request){
        $event = DB::table('users')->join('events', 'users.id', '=', 'events.user_id')
        ->where('events.id','=',$request->id)
        ->first();
        return view('admin.pages.examples.edit',['event' => $event]);
    }
    public function edit(Request $request){
        if($request->_token == csrf_token()){
            if ( $request->status == 0 || Gate::denies('role-user', $level= 3) ) {
                $rules = [
                    'title' =>'required|min:3|max:191',
                    'content' => 'required|min:100',
                    'start_time' => 'date|before:end_time',
                    'end_time' => 'date|after:start_time',
                ];
                $messages = [
                    'title.required' => 'Bạn chưa nhập tiêu đề cho sự kiện',
                    'title.min' => 'Tiêu đề ít nhất 3 ký tự',
                    'title.max' => 'Tiêu đề không vượt quá 255 ký',
                    'content.required' => 'Bạn chưa nhập nội  dung',
                    'content.min' => 'Nội dung ít nhất phải 100 ký tự',
                    'start_time.date' => 'Băt buộc phải là kiểu thời gian',
                    'start_time.before' => 'Thời bắt đầu phải trước thời gian kết thúc',
                    'end_day.date' => 'Băt buộc phải là kiểu thời gian',
                    'end_time.after' => 'Thời gian kết thúc phải sau thời gian bắt đầu',
                ];
                $validator = Validator::make($request->all(), $rules, $messages);
                if ($validator->fails()) {
                    // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
                    // return redirect()->route('add',['type'=>$category])->with('thongbao','Bạn chưa chọn hãng sản phẩm');
                    return redirect()->route('managerEdit',['id' => $request->id,'type'=>$request->type,'post-user' => $request->author])->withErrors($validator)->withInput();
                } else {
                    $imgCurrent = DB::table('events')->where('id','=',$request->id)->first()->photo_cover;
                    $userCurrent = DB::table('events')->where('id','=',$request->id)->first()->user_id;
                    // dd($imgCurrent);
                    // File::delete('admin/img/'.$imgCurrent);
                    $img = $request->img_cover;
                    if($img != null){
                        $fileName = $request->img_cover->getClientOriginalName();
                        if($img->getClientOriginalExtension('img_cover') == "jpg"||$img->getClientOriginalExtension('img_cover') == "png"){
                            $img->move('admin/img',$fileName);
                            if(File::exists('admin/img/'.$imgCurrent)){
                                File::delete('admin/img/'.$imgCurrent);
                            }
                        }else{
                            Session::flash('success', 'Sai đinh dạng ảnh :((');
                            return redirect()->route('managerEdit',['type'=>$request->type,'post-user' => $request->author]);
                        };
                    }else {
                        $fileName = $imgCurrent;
                    }
                    DB::table('events')->where('id','=',$request->id)
                    ->update([
                        'photo_cover' => $fileName,
                        'title' => $request->title,
                        'slug' => $this->slug($request->title,time()),
                        'content' => $request->content,
                        'type' => $request->type,
                        'user_id' => $userCurrent,
                        'status' => $request->status,
                        'start_day' => $request->start_time,
                        'end_day' => $request->end_time,
                        'updated_at' => now(),
                    ]);
                    // Session::flash('success', 'Bạn đã thêm user thành công!');
                    // return redirect()->route('add')->with('thongbao','Sai định dạng ảnh');
                    Session::flash('success', 'Bạn sửa thông tin thành công!');
                    return redirect()->route('events',['type'=>$request->type]);
                }
            }else {
                return view('admin.pages.examples.500');
            }
        }
    }
    public function delete(Request $request){
        if($request->_token == csrf_token()){
            if (Gate::denies('role-user', $level= 3)) {
                DB::table('events')->where('id', '=', $request->id)->delete();
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
}
