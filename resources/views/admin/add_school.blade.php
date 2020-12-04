@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm các đơn vị đào tạo
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
                    <form role="form" action="{{URL::to('save-school')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên trường</label>
                            <input type="text" name="school_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>

                         <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ trường</label>
                            <input type="text" name="school_address" class="form-control" id="exampleInputEmail1" placeholder="Giá sản phẩm">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Hình ảnh </label>
                            <input type="file" name="school_image" class="form-control" id="exampleInputPassword1"></input>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Số điện thoại</label>
                            <input type="text" name="school_phone" class="form-control" id="exampleInputEmail1" placeholder="Giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="school_status" class="form-control input-sm m-bot15">
                                <option value="0">Hien</option>
                                <option value="1">An</option>
                            </select>
                        </div>
                        <button type="submit" name="add_school"class="btn btn-info">Thêm trường</button>
                    </form>
                    </div>

                </div>
            </section>
    </div>
    @endsection