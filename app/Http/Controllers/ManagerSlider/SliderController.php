<?php

namespace App\Http\Controllers\ManagerSlider;

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

class SliderController extends Controller
{
    public function index(Request $request){
        if(Auth::check()){
            $dataSlider = DB::table('images')->where('type','=',$request->type)->get();
            return view('admin.pages.examples.slider',['dataSlider'=>$dataSlider]);
        }else{
            return redirect()->route('logins');
        }
    }
    //add slider
	public function postSlider(Request $request){
        $rules = [
            'img_slider'=>'required'
        ];
        $messages = [
            'img_slider.required'=>'Bạn chưa chọn ảnh',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->route('slider',['type'=>1])->withErrors($validator)->withInput();
        }else {
            $img = $request->img_slider;
            if($img){
                foreach($img as $file){
                    if(isset($file)){
                        //images slider
                        if($request->type == 1){
                            if($file->getClientOriginalExtension('img_slider') == "jpg"||$file->getClientOriginalExtension('img_slider') == "png"){
                                $totalImg =  DB::table('images')->where('type',$request->type)->get();
                                // dd(count($totalImg));
                                if(count($totalImg) >5 || count($img ) >5){
                                    Session::flash('success', 'Số lượng ảnh slide không được vượt quá 5');
                                    return redirect()->route('slider',['slider','type'=>$request->type]);
                                }else {
                                    DB::table('images')
                                        ->insert([
                                            'thumbnail' => $file->getClientOriginalName('img_slider'),
                                            'type' => $request->type,//$request->type
                                            'created_at' => now()
                                            ]
                                        );
                                    $file->move('admin/img/',$file->getClientOriginalName('img_slider'));
                                }
                            }else{
                                Session::flash('success', 'Yêu cầu định dạng file .jpg hoặc .png!');
                                return redirect()->route('slider',['slider','type'=>$request->type]);
                            }
                        }
                        //logo
                        elseif ($request->type == 3) {
                            
                            if($file->getClientOriginalExtension('img_slider') == "jpg"||$file->getClientOriginalExtension('img_slider') == "png"){
                                $totalImg =  DB::table('images')->where('type',$request->type)->get();
                                // dd(count($totalImg));
                                if(count($totalImg) >=1 || count($img ) >1){
                                    
                                    Session::flash('success', 'Bạn phải xóa logo cũ trước khi sử dụng logo mới');
                                    return redirect()->route('slider',['slider','type'=>$request->type]);
                                }else {
                                    DB::table('images')
                                        ->insert([
                                            'thumbnail' => $file->getClientOriginalName('img_slider'),
                                            'type' => $request->type,//$request->type
                                            'created_at' => now()
                                            ]
                                        );
                                    $file->move('admin/img/',$file->getClientOriginalName('img_slider'));
                                }
                            }else{
                                Session::flash('success', 'Yêu cầu định dạng file .jpg hoặc .png!');
                                return redirect()->route('slider',['slider','type'=>$request->type]);
                            }
                        }
                        //video
                        else if ($request->type == 2) {
                            $totalImg =  DB::table('images')->where('type',$request->type)->get();
                            if(count($totalImg) >= 1){
                                Session::flash('success', 'Bạn cần phải xóa video cũ trước khi tải video mới!');
                                return redirect()->route('slider',['slider','type'=>$request->type]);
                            }else {
                                if($file->getClientOriginalExtension('img_slider') == "jpg"||$file->getClientOriginalExtension('img_slider') == "png"){
                                    Session::flash('success', 'Yêu cầu định dạng file .mp4!');
                                    return redirect()->route('slider',['slider','type'=>$request->type]);
                                }else {
                                    DB::table('images')
                                    ->insert([
                                        'thumbnail' => $file->getClientOriginalName('img_slider'),
                                        'type' => $request->type,//$request->type
                                        'created_at' => now()
                                        ]
                                    );
                                $file->move('admin/img/',$file->getClientOriginalName('img_slider'));
                                }
                            }
                        }
                    }
                }
            }
            Session::flash('success', 'Thêm thành công!');
            // dd('asd');
            return redirect()->route('slider',['slider','type'=>$request->type]);
        }
    }
    //delete slider
	public function getDeleteSlider(Request $request){
        if (Gate::denies('role-user', $level= 3)) {
            $dataImageSlider = DB::table('images')->where('id',$request->id)->get();
            foreach ($dataImageSlider as $value) {
                if(!empty($dataImageSlider)){
                    $img = 'admin/img/'.$value->thumbnail;
                    if(File::exists($img)){
                        File::delete($img);
                    }
                    DB::table('images')->where('id',$request->id)->delete();
                    return "Oke";
                }
            }
        }else {
            return response()->json([
                'success' => 'Bạn không có quyền để thực hiện chức năng này!'
            ],500);
        }
    }
}
