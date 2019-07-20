<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Session;
use Gate;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.pages.examples.500');
        $categories = DB::table('cate_event')->get();
        $sub_categories_event = DB::table('cate_event')->join('sub_cate_event', 'cate_event.id', '=', 'sub_cate_event.cate_id')->where('cate_event.type_cate','=',1)->get();
        $sub_categories_staff = DB::table('cate_event')->join('sub_cate_event', 'cate_event.id', '=', 'sub_cate_event.cate_id')->where('cate_event.type_cate','=',2)->get();
        $sub_categories_device = DB::table('cate_event')->join('sub_cate_event', 'cate_event.id', '=', 'sub_cate_event.cate_id')->where('cate_event.type_cate','=',3)->get();
        return view('admin.pages.examples.category',[
            'categories'=>$categories,
            'sub_categories_event'=>$sub_categories_event,
            'sub_categories_staff'=>$sub_categories_staff,
            'sub_categories_device'=>$sub_categories_device,
        ]);
    }
    public function addCategory(){
        return view('admin.pages.examples.addCategory');
    }
    public function addCategoryData(Request $request){
        if($request->_token == csrf_token()){
            $rules = [
                'name' =>'required|min:3|max:255',
            ];
            $messages = [
                'name.required' => 'Bạn chưa nhập tiêu đề cho sự kiện',
                'name.min' => 'Tiêu đề ít nhất 3 ký tự',
                'name.max' => 'Tiêu đề không vượt quá 255 ký',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return redirect()->route('addCategory')->withErrors($validator)->withInput();
            } else {
                // dd($request);
               if($request->category == 0){
                    Session::flash('error', 'Bạn chưa chọn kiểu cho thể loại');
                    return redirect()->route('addCategory');
                }else{
                    $idCate = DB::table('cate_event')->insertGetId([
                        'name_cate' => $request->name,
                        'type_cate' => $request->category,
                        'created_at' => now(),
                    ]);
                    if($request->sub_category != null){
                        foreach ($request->sub_category as $key => $value) {
                            DB::table('sub_cate_event')->insert([
                                'name_sub_cate' => $value,
                                'cate_id'=> $idCate,
                                'created_at' => now(),
                            ]);
                        }
                    }
                    Session::flash('success', 'Bạn vừa mới thêm thành công!');
                    return redirect()->route('category');
                }
            }
        }
    }
    public function deleteCategoryData(Request $request){
        if($request->_token == csrf_token()){
            if (Gate::denies('role-user', $level= 3)) {
                $cate_te = DB::table('cate_event')->join('events', 'cate_event.id', '=', 'events.cate')->leftJoin('sub_cate_event', 'cate_event.id', '=', 'sub_cate_event.cate_id')->where('cate_event.id','=',$request->id)->get();
                if($cate_te){
                    return response()->json([
                        'success' => 'Bạn xóa tât cả các các thể loại con và sự kiện thuộc thể loại này thì mới có thể thực việc xóa!'
                    ],500);
                }else {
                    DB::table('cate_event')->where('id', '=', $request->id)->delete();
                    return response()->json([
                        'success' => 'Bạn đã xóa thành công!'
                    ],200);
                }
            }else {
                return response()->json([
                    'success' => 'Bạn không có quyền để thực hiện chức năng này!'
                ],500);
            }
        }
    }
    public function deleteCategorySubData(Request $request){
        if (Gate::denies('role-user', $level= 3)) {
            //$cate_te = DB::table('cate_event')->join('events', 'cate_event.id', '=', 'events.cate')->leftJoin('sub_cate_event', 'cate_event.id', '=', 'sub_cate_event.cate_id')->where('sub_cate_event.id','=',$request->id)->get();
            // if($cate_te){
            //     return response()->json([
            //         'success' => 'Bạn xóa tât cả các các thể loại con và sự kiện thuộc thể loại này thì mới có thể thực việc xóa!'
            //     ],500);
            // }else {
                DB::table('sub_cate_event')->where('id', '=', $request->id)->delete();
                return response()->json([
                    'success' => 'Bạn đã xóa thành công!'
                ],200);
            //}
        }else {
            return response()->json([
                'success' => 'Bạn không có quyền để thực hiện chức năng này!'
            ],500);
        }
    }
    public function getDataSubCate(Request $request){
        if($request->_token == csrf_token()){
            $subCate = DB::table('sub_cate_event')->where('cate_id','=',$request->cate_id)->get();
            return response()->json([
                'subCate' => $subCate
            ],200);
        }else {
            return response()->json([
                'success' => 'error!'
            ],200);
        }
    }
}
