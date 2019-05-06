<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">   
    <link rel="stylesheet" href="{{asset('css/about_p.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
    <script src="{{url('js/jquery-3.4.0.min.js')}}"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    @yield('styles')
</head>
<body>
@include('partials.header')
<div class="container">
    @yield('content')
</div>


<script src="{{url('js/bootstrap.min.js')}}"></script>
@yield('scripts')
</body>
</html>