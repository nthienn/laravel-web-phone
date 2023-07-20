<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>Website Bán Điện Thoại Cũ</title> --}}
    @yield('title')

    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/grid.css') }}">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css' rel='stylesheet'>
</head>

<body>
    <div class="app">
        @include('components.header')
        <div class="container">
            <div class="grid wide">
                @yield('content')
            </div>
        </div>
        @include('components.footer')
    </div>
</body>

</html>
