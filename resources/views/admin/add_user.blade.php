@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm tài khoản cho đơn vị đào tạo
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
                    <form role="form" action="{{URL::to('save-user')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên tài khoản</label>
                            <input type="email" name="user_name" class="form-control" id="exampleInputEmail1">
                        </div>

                         <div class="form-group">
                            <label for="exampleInputEmail1">Mật khẩu</label>
                            <input type="password" name="user_password" class="form-control" id="exampleInputEmail1">
                        </div>                   
                        <button type="submit" name="add_user"class="btn btn-info">Thêm tài khoản</button>
                    </form>
                    </div>

                </div>
            </section>
    </div>
    @endsection