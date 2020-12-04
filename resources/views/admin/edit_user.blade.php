@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Sửa thông tin tài khoản
                </header>
                <div class="panel-body">
                    <?php
                        $message = Session::get('message');
                        if($message){
                            echo '<span class="text-alert">', $message,'</span>';
                            Session::put('message',null);
                        }
                    ?>
                    <div class="position-center">
                        @foreach($edit_user as $key => $user)
                    <form role="form" action="{{URL::to('/update-user/'.$user->user_id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên tài khoản</label>
                            <input type="text" name="user_name" class="form-control" id="exampleInputEmail1" value="{{$user->user_name}}">
                        </div>

                         <div class="form-group">
                            <label for="exampleInputEmail1">Mật khẩu</label>
                            <input type="text" name="user_password" class="form-control" id="exampleInputEmail1" value="{{$user->user_password}}">
                        </div>
                        <button type="submit" name="add_user"class="btn btn-info">Cập nhật thông tin tài khoản</button>
                    </form>
                    @endforeach
                    </div>

                </div>
            </section>
    </div>
    @endsection