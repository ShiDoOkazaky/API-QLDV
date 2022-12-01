@extends('layouts.master')

@section('content')


@if ($errors->any())
<div class="alert alert-danger text-center ">
    Vui lòng kiểm tra lại
</div>
@endif
  
    <form action="{{route('post-update')}}" method="POST">
        @csrf 
        @method('PUT')

      <div class="container">

        <div class="row">
          <div class="col-md-6 form-group mb-3 ms-auto">
            <label for="name">Tên đơn vị</label>
            <span class="text-danger text-bold">(*)</span>
            <input type="text" name="name" class="form-control" placeholder="Tên đơn vị" value="{{old('name') ?? $userDetail->name}}"/>
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
            <input type="text" name="description" class="form-control" placeholder="Mô tả" value="{{old('description') ?? $userDetail->description}}" />
          </div>
          <div class="col-md-6 form-group mb-3 ms-auto">
            <label for="address">Địa chỉ</label>
            <span class="text-danger text-bold">(*)</span>
            <input type="text" name="address" class="form-control" placeholder="Địa chỉ đơn vị công tác" value="{{old('address') ?? $userDetail->address}}"  />
            @error('address')
              <span style="color: red">{{$message}}</span>    
            @enderror
          </div>
          <div class="col-md-6 form-group mb-3 ms-auto">
            <label for="webside">Webside</label>
            <span class="text-danger text-bold">(*)</span>
            <input type="text" name="webside" class="form-control" placeholder="webside nơi đơn vị công tác" value="{{old('webside') ?? $userDetail->webside}}" />
            @error('webside')
              <span style="color: red">{{$message}}</span>    
            @enderror
          </div>
          <div class="col-md-6 form-group mb-3 ms-auto">
            <label for="phone">SĐT</label>
            <span class="text-danger text-bold">(*)</span>
            <input type="text" name="phone" class="form-control" placeholder="SĐT của đơn vị" value="{{old('phone') ?? $userDetail->phone}}" />
            @error('phone')
              <span style="color: red">{{$message}}</span>    
            @enderror
          </div>
          <div class="col-md-6 form-group mb-3 ms-auto">
            <label for="email">Email </label>
            <span class="text-danger text-bold">(*)</span>
            <input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email') ?? $userDetail->email}}"/>
            @error('email')
              <span style="color: red">{{$message}}</span>    
            @enderror
          </div>
          <div class="col-md-6 form-group mb-3 ms-auto">
            <label for="fax">FAX </label>
            <span class="text-danger text-bold">(*)</span>
            <input type="text" name="fax" class="form-control" placeholder="Fax" value="{{old('fax') ?? $userDetail->fax}}" />  
            @error('fax')
              <span style="color: red">{{$message}}</span>    
            @enderror 
          </div> 
        </div>

        <div class="col-8 form-group mb-3 ms-auto" >
          <button type="submit" class="btn btn-primary">Cập nhập</button>
          <a href="{{route('index')}}" class="btn btn-warning">Quay lại</a>
        </div>
      </div>
        
    </form>

@endsection
