<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class SchoolController extends Controller
{
    public function add_school(){
        return view('admin.add_school');
    }

    public function all_school(){
       $all_school = DB::table('tbl_school')->get();
       $manager_school = view('admin.all_school')->with('all_school',$all_school);
        return view('admin_layout')->with('admin.all_school',$manager_school);

    }
    public function save_school(Request $request){
        
        $data = array();
        $data['school_name'] = $request->school_name;
        $data['school_address'] = $request->school_address;
        $data['school_phone'] = $request->school_phone;
        $data['school_status'] = $request->school_status;
        // $data['product_image'] = $request->product_image;

        $get_image = $request->file('school_image');
       
        if($get_image){
        	$get_name_image = $get_image->getClientOriginalName();
        	$name_image = current(explode('.',$get_name_image));
        	$new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        	$get_image->move('public/uploads/product',$new_image);
        	$data['school_image'] = $new_image;
        	DB::table('tbl_school')->insert($data);
       		Session::put('message','Thêm trường thành công');
       		return Redirect::to('add-school');

        }
        $data['school_image'] = '';
        	DB::table('tbl_school')->insert($data);
       		Session::put('message','Thêm trường thành công');
        return Redirect::to('all-school');
       

    }


    public function unactive_school($school_id){
        DB::table('tbl_school')->where('school_id',$school_id)->update(['school_status'=>1]);
        Session::put('message','Kích hoạt ẩn thành công');
        return Redirect::to('all-school');
    }
    public function active_school($school_id){
        DB::table('tbl_school')->where('school_id',$school_id)->update(['school_status'=>0]);
        Session::put('message','Kích hoạt hiện thành công');
        return Redirect::to('all-school');
    }

    public function edit_school($school_id){
        $edit_school = DB::table('tbl_school')->where('school_id',$school_id)->get();
       $manager_school = view('admin.edit_school')->with('edit_school',$edit_school);
        return view('admin_layout')->with('admin.edit_school',$manager_school);
    }
    public function delete_school($school_id){
         DB::table('tbl_school')->where('school_id',$school_id)->delete();
       Session::put('message','Xóa trường thành công');
        return Redirect::to('all-school');
    }

    public function update_school(Request $request,$school_id){
        $data = array();
        $data['school_name'] = $request->school_name;
        $data['school_address'] = $request->school_address;
        $data['school_phone'] = $request->school_phone;
        $data['school_status'] = $request->school_status;
        $get_image = $request->file('school_image');
        
        if($get_image){
                    $get_name_image = $get_image->getClientOriginalName();
                    $name_image = current(explode('.',$get_name_image));
                    $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                    $get_image->move('public/uploads/product',$new_image);
                    $data['school_image'] = $new_image;

                    DB::table('tbl_school')->where('school_id',$school_id)->update($data);
                    Session::put('message','Cập nhật trường thành công');
                    return Redirect::to('all-school');
        }
            
        DB::table('tbl_school')->where('school_id',$school_id)->update($data);
        Session::put('message','Cập nhật trường thành công');
        return Redirect::to('all-school');
    }   
}
