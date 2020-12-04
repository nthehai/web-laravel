<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class UserController extends Controller
{
   
    public function add_user(){
        return view('admin.add_user');
    }

    public function all_user(){
       $all_user = DB::table('tbl_user')->get();
       $manager_user = view('admin.all_user')->with('all_user',$all_user);
        return view('admin_layout')->with('admin.all_user',$manager_user);

    }
    public function save_user(Request $request){
        
        $data = array();
        $data['user_name'] = $request->user_name;
        $data['user_password'] = $request->user_password;
            DB::table('tbl_user')->insert($data);
            Session::put('message','Thêm tài khoản thành công');
        return Redirect::to('all-user');

}
    public function edit_user($user_id){
        $edit_user = DB::table('tbl_user')->where('user_id',$user_id)->get();
       $manager_user = view('admin.edit_user')->with('edit_user',$edit_user);
        return view('admin_layout')->with('admin.edit_user',$manager_user);
    }
    public function delete_user($user_id){
         DB::table('tbl_user')->where('user_id',$user_id)->delete();
       Session::put('message','Xóa tài khoản thành công');
        return Redirect::to('all-user');
    }

    public function update_user(Request $request,$user_id){
        $data = array();
        $data['user_name'] = $request->user_name;
        $data['user_password'] = $request->user_password;
            
        DB::table('tbl_user')->where('user_id',$user_id)->update($data);
        Session::put('message','Cập nhật tài khoản thành công');
        return Redirect::to('all-user');
    }   
    

}
