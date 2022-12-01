@extends ('layouts.master')

@section('content')

<h1>Thêm người dùng</h1>
<form action="" method="POST">
    <div class="mb-3">
        <label for="">Tên người dùng</label>
        <input type="text" name="user" class="form-control" placeholder="nhập tên người dùng">
    </div>
    <div class="mb-3">
        <label for="">email</label>
        <input type="text" name="email" class="form-control" placeholder="nhập email người dùng">
    </div>

    <button type="submit">Thêm mới</button>

    @csrf
</form>

@endsection