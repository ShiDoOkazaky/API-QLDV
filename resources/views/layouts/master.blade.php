<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') Quản Lý Đơn Vị</title>
    <link rel="stylesheet" href="{{asset('qldv/css/bootstrap.min.css')}}">
    @yield('css')
</head>
<body>
    @include('layouts.header')
    @include('layouts.sidebar')
    <main class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="content">
                       @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </main>
    <link rel="stylesheet" href="{{asset('qldv/js/bootstrap.min.js')}}">
    @yield('js')
</body>
</html>