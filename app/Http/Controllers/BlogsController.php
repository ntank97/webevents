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

class BlogsController extends Controller
{
    public function index(Request $request){
        $blogs = DB::table('users')->join('blog', 'users.id', '=', 'blog.user_id')->orderBy('blog.id','desc')->get();
        return view('admin.pages.examples.blogs',['blogs' => $blogs]);
    }
    //change status of blog
    public function change(Request $request){
        
        if($request->_token == csrf_token()){
            DB::table('blog')->where('id', '=', $request->id)->update([
                'status' => $request->status,
                'updated_at' => now(),
            ]);
            return response()->json([
                'success' => 'Bạn đã thay đổi thành công'
            ],200);
        }
    }
    //add
    public function addBlog(Request $request){
        return view('admin.pages.examples.addBlog');
    }
    public function editBlog(Request $request){
        $blog = DB::table('users')->join('blog', 'users.id', '=', 'blog.user_id')->where('blog.slug','=',$request->slug)->first();
        // dd($blog);
        return view('admin.pages.examples.editBlog',['blog'=>$blog]);
    }
    public function addBlogData(Request $request){
        if($request->_token == csrf_token()){
            $rules = [
                'title' =>'required|min:3|max:255',
                'content' => 'required|min:100',
                'img_cover' => 'required',
                'short_cut' => 'required|min:10|max:255',
            ];
            $messages = [
                'title.required' => 'Bạn chưa nhập tiêu đề cho sự kiện',
                'title.min' => 'Tiêu đề ít nhất 3 ký tự',
                'title.max' => 'Tiêu đề không vượt quá 255 ký',
                'content.required' => 'Bạn chưa nhập nội  dung',
                'content.min' => 'Nội dung ít nhất phải 100 ký tự',
                'img_cover.required' => 'Bạn chưa chọn ảnh nền',
                'short_cut.required' => 'Bạn chưa nhập tóm tắt nội dung cho sự kiện',
                'short_cut.min' => 'Tóm tắt nội dung ít nhất 10 ký tự',
                'short_cut.max' => 'Tóm tắt nội dung không vượt quá 255 ký',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return redirect()->route('addBlog')->withErrors($validator)->withInput();
            } else {
                // dd($request);
                $img = $request->img_cover;
                $fileName = $request->img_cover->getClientOriginalName();
                DB::table('blog')->insert([
                    'slug' => $this->slug($request->title,time()),
                    'title' => $request->title,
                    'short_cut' => $request->short_cut,
                    'photo_cover' => $fileName,
                    'content' => $request->content,
                    'user_id' => $request->user_id,
                    'status' => 0,
                    'created_at' => now(),
                ]);
                if($img->getClientOriginalExtension('img_cover') == "jpg"||$img->getClientOriginalExtension('img_cover') == "png"){
                    $img->move('admin/img',$fileName);
                }else{
                    Session::flash('error', 'Sai đinh dạng ảnh :((');
                    return redirect()->route('addBlog');
                };
                Session::flash('success', 'Bạn vừa mới thêm một sự kiên thành công!');
                return redirect()->route('blogs');
            }
        }
    }
    //edit
    public function editBlogData(Request $request){
        if($request->_token == csrf_token()){
            
            if ( $request->status == 0 || Gate::denies('role-user', $level= 3) ) {
                $rules = [
                    'title' =>'required|min:3|max:191',
                    'content' => 'required|min:100',
                    'short_cut' => 'required|min:10|max:255',
                ];
                $messages = [
                    'title.required' => 'Bạn chưa nhập tiêu đề cho sự kiện',
                    'title.min' => 'Tiêu đề ít nhất 3 ký tự',
                    'title.max' => 'Tiêu đề không vượt quá 255 ký',
                    'content.required' => 'Bạn chưa nhập nội  dung',
                    'content.min' => 'Nội dung ít nhất phải 100 ký tự',
                    'short_cut.required' => 'Bạn chưa nhập tóm tắt nội dung cho sự kiện',
                    'short_cut.min' => 'Tóm tắt nội dung ít nhất 10 ký tự',
                    'short_cut.max' => 'Tóm tắt nội dung không vượt quá 255 ký',
                ];
                $validator = Validator::make($request->all(), $rules, $messages);
                if ($validator->fails()) {
                    // dd($request);
                    return redirect()->route('editBlog',['slug'=>$request->slug])->withErrors($validator)->withInput();
                } else {
                
                    $imgCurrent = DB::table('blog')->where('id','=',$request->id)->first()->photo_cover;
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
                            return redirect()->route('editBlog',['slug'=>$request->slug]);
                        };
                    }else {
                        $fileName = $imgCurrent;
                    }
                    // dd($request->id);
                    DB::table('blog')->where('id','=',$request->id)
                    ->update([
                        'slug' => $this->slug($request->title,time()),
                        'title' => $request->title,
                        'short_cut' => $request->short_cut,
                        'photo_cover' => $fileName,
                        'content' => $request->content,
                        'user_id' => $request->user_id,
                        'status' => $request->status,
                        'created_at' => now(),
                    ]);
                    Session::flash('success', 'Bạn sửa thông tin thành công!');
                    return redirect()->route('blogs');
                }
            }else {
                return view('admin.pages.examples.500');
            }
        }
    }
    //delete
    public function deleteBlogData(Request $request){
        if($request->_token == csrf_token()){
            if (Gate::denies('role-user', $level= 3)) {
                DB::table('blog')->where('id', '=', $request->id)->delete();
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
