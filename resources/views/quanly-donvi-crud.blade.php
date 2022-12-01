@extends('layouts.master')

{{-- @section('sidebar')
    @include('layouts.sidebar')
@endsection --}}

@section('content')


   
    <a href="" class="btn btn-primary">Thêm dữ liệu</a>

    <hr>
    <form action="" method="get">
        <div class="row justify-center">
            <div class="col-4">
                <input type="search" class="form-control" name="keywords" placeholder="tìm kiếm...">
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-primary btn-block">Tìm Kiếm </button>
            </div>
        </div>
    </form>

    <table class="table table-striped" style="text-align: center">
        <thead>
            <tr>
              <th width="10%">Tên đơn vị</th>
              <th width="15%">Loại đơn vị</th>
              <th width="30%">Mô tả</th>
              <th>Địa chỉ</th>
              <th>Webside</th>
              <th>SĐT</th>
              <th>Email</th>
              <th>Fax</th>
              
            </tr>
          </thead>
          <tbody>
            @if (!empty($usersList))
                @foreach ($usersList as $key => $item)
            <tr>
              <td>{{$item->name}}</td>
              <td>{{$item->loaidonvi}}</td>
              <td>{{$item->description}}</td>
              <td>{{$item->address}}</td>
              <td>{{$item->webside}}</td>
              <td>{{$item->phone}}</td>
              <td>{{$item->email}}</td>
              <td>{{$item->fax}}</td>
              <td>
                  <a href="" class="btn btn-warning btn-sm">Sửa</a>
              </td>
              <td>
                  <a onclick="return confirm('Bạn có muốn xóa?')" href="" class="btn btn-danger btn-sm">Xóa</a>
              </td>
            </tr>
                @endforeach
            @else 
            <tr>
                <td colspan="8">Không có dữ liệu</td>
            </tr>      
            @endif
          </tbody>
    </table>
    <ul class="pagination justify-content-end" style="margin:20px 0">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
    
@endsection 






