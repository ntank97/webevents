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

class PartnerController extends Controller
{
    public function index(Request $request){
        $partner = DB::table('partner')->get();
        return view('admin.pages.examples.partner',['partner' => $partner]);
    }
    public function getDataAjax(Request $request){
        if($request->has('id')){
            $partner = DB::table('partner')->where('id','=',$request->id)->first();
            if($partner){
                return response()->json([
                    'partner' => $partner
                ],200);
            }else {
                return response()->json([
                    'messge' => 'fail'
                ],500);
            }
            
        }
    }
    public function partnerAddEdit(Request $request){
        // dd($request);
        if($request->_token == csrf_token()){
            if (Gate::denies('role-user', $level= 3)) {
                $rules = [
                    'name' =>'required|min:3|max:255',
                    'file' => 'required',
                ];
                $messages = [
                    'name.required' => 'Bạn nhập tên cho đối tác',
                    'name.min' => 'Tên ít nhât phải từ 3 ký tự trở lên',
                    'name.max' => 'Tên không vượt quá 255 ký',
                    'file.required' => 'Bạn chưa chọn logo',
                ];
                $validator = Validator::make($request->all(), $rules, $messages);
                if ($validator->fails()) {
                    return redirect()->route('partner')->withErrors($validator)->withInput();
                } else {
                    $imgCurrent = ($request->has('id'))?DB::table('partner')->where('id','=',$request->id)->first()->photo_prtner:'';
                    $img = $request->file;
                    if($img != null){
                        $fileName = $request->file->getClientOriginalName();
                        if($img->getClientOriginalExtension('file') == "jpg"||$img->getClientOriginalExtension('file') == "png"){
                            $img->move('admin/img',$fileName);
                            if ($request->has('id')) {
                                if(File::exists('admin/img/'.$imgCurrent)){
                                    File::delete('admin/img/'.$imgCurrent);
                                }
                            }
                        }else{
                            Session::flash('success', 'Sai đinh dạng ảnh :((');
                            return redirect()->route('partner');
                        };
                        
                    }else {
                        $fileName = $imgCurrent;
                    }
                    if ($request->has('id')) {
                        DB::table('partner')->where('id','=',$request->id)
                        ->update([
                            'name' => $request->name,
                            'photo_prtner' => $fileName,
                            'updated_at' => now(),
                        ]);
                        Session::flash('success', 'Bạn đã sửa thành công!');
                    }else {
                        DB::table('partner')->insert(
                            [
                                'name' => $request->name,
                                'photo_prtner' => $fileName,
                                'created_at' => now(),
                            ]
                        );
                        Session::flash('success', 'Bạn đã thêm thành công!');
                    }
                    return redirect()->route('partner');
                }
            }else {
                return view('admin.pages.examples.500');
            }
        }
    }
    public function partnerDelete(Request $request){
        if($request->_token == csrf_token()){
            if (Gate::denies('role-user', $level= 3)) {
                DB::table('partner')->where('id', '=', $request->id)->delete();
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