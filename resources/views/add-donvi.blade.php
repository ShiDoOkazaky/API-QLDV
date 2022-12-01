@extends('layouts.master')

@section('content')


@if ($errors->any())
<div class="alert alert-danger text-center ">
    Vui lòng kiểm tra lại
</div>
@endif
  
    <form action="quanly-donvi-create" method="POST">

      <div class="container">

        <div class="row">
          <div class="col-md-6 form-group mb-3 ms-auto">
            <label for="name">Tên đơn vị</label>
            <span class="text-danger text-bold">(*)</span>
            <input type="text" name="name" class="form-control" placeholder="Tên đơn vị" />
            @error('name')
            <span style="color: red">{{$message}}</span>    
            @enderror
          </div>
          <div class="col-md-6 form-group mb-3 ms-auto">
            <label for="loaidonvi">Loại đơn vị</label>
            <span class="text-danger text-bold">(*)</span>
            <select name="loaidonvi" class="form-control" style="width: 50%; height: 70%;" type="text">
                {{-- option --}}
                <option value="0"{{old('loaidonvi')==0?'selected':false}}selected ="selected" >-- Chọn loại đơn vị --</option>
                <option value="Đơn vị quản lý"{{old('loaidonvi')==1?'selected':false}}>Đơn vị quản lý</option>
                <option value="Đơn vị cấp phép"{{old('loaidonvi')==2?'selected':false}}>Đơn vị cấp phép</option>
                <option value="Đơn vị thực hiện"{{old('loaidonvi')==3?'selected':false}}>Đơn vị thực hiện</option>
                <option value="Đơn vị giám sát"{{old('loaidonvi')==4?'selected':false}}>Đơn vị giám sát</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group mb-3 ms-auto">
            <label for="description">Mô tả</label>
            <input type="text" name="description" class="form-control" placeholder="Mô tả" />
          </div>
          <div class="col-md-6 form-group mb-3 ms-auto">
            <label for="address">Địa chỉ</label>
            <span class="text-danger text-bold">(*)</span>
            <input type="text" name="address" class="form-control" placeholder="Địa chỉ đơn vị công tác" />
            @error('address')
              <span style="color: red">{{$message}}</span>    
            @enderror
          </div>
          <div class="col-md-6 form-group mb-3 ms-auto">
            <label for="webside">Webside</label>
            <span class="text-danger text-bold">(*)</span>
            <input type="text" name="webside" class="form-control" placeholder="webside nơi đơn vị công tác" />
            @error('webside')
              <span style="color: red">{{$message}}</span>    
            @enderror
          </div>
          <div class="col-md-6 form-group mb-3 ms-auto">
            <label for="phone">SĐT</label>
            <span class="text-danger text-bold">(*)</span>
            <input type="text" name="phone" class="form-control" placeholder="SĐT của đơn vị" />
            @error('phone')
              <span style="color: red">{{$message}}</span>    
            @enderror
          </div>
          <div class="col-md-6 form-group mb-3 ms-auto">
            <label for="email">Email </label>
            <span class="text-danger text-bold">(*)</span>
            <input type="text" name="email" class="form-control" placeholder="Email" />
            @error('email')
              <span style="color: red">{{$message}}</span>    
            @enderror
          </div>
          <div class="col-md-6 form-group mb-3 ms-auto">
            <label for="fax">FAX </label>
            <span class="text-danger text-bold">(*)</span>
            <input type="text" name="fax" class="form-control" placeholder="Fax" />  
            @error('fax')
              <span style="color: red">{{$message}}</span>    
            @enderror 
          </div> 
        </div>

        <div class="col-8 form-group mb-3 ms-auto" >
          <button type="submit" class="btn btn-primary">Thêm</button>
          <a href="{{route('index')}}" class="btn btn-warning">Quay lại</a>
        </div>
      </div>
      @csrf   
    </form>

@endsection
