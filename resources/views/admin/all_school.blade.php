@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Danh sách các đơn vị đào tạo
    </div>
      <div class="row w3-res-tb">
        <!-- <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div> -->
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Tìm kiếm</button>
            </span>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <?php
                        $message = Session::get('message');
                        if($message){
                            echo '<span class="text-alert">', $message,'</span>';
                            Session::put('message',null);
                        }
                    ?>
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
              </th>
              <th>Tên trường </th>
              <th>Địa chỉ </th>
              <th>Hình ảnh</th>
              <th>Số điện thoại</th>
              <th>Hiện thị</th>
              
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach( $all_school as $key => $school_sch)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $school_sch->school_name }} </td>
             <td>{{ $school_sch->school_address }} </td>
              <td><img src= "public/uploads/product/{{ $school_sch->school_image }}" height="100" width="100"></td>
              <td>{{ $school_sch->school_phone }} </td>
              
              <td><span class="text-ellipsis">
                <?php
                if($school_sch->school_status == 0){
                  ?>
                   <a href="{{ URL::to('/unactive-school/'.$school_sch->school_id)}}"><button> Hiện </button> </a>';
                  <?php
                    }else{
                  ?> 
                    <a href="{{ URL::to('/active-school/'.$school_sch->school_id)}}"><button>Ẩn</button></a>;
                    <?php
                }           
                ?>
              </span></td>
             
              <td>
              <a href="{{URL::to('/edit-school/'.$school_sch->school_id)}}" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
                <a onclick="return confirm('Bạn có muốn xóa trường này không?')" href="{{URL::to('/delete-school/'.$school_sch->school_id)}}" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-times text-danger text"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
            
        </div>
@endsection