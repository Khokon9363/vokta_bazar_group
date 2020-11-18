<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('voktabazar/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('voktabazar/css/clean-blog.min.css') }}" rel="stylesheet">
    <style>
        .card:hover{
            box-shadow: 12px 11px 13px -2px;
            transition: 0.5s;
            transform: scale(1.02);
        }
    </style>
</head>
<body style="background-color: #F0FEFC">
<div id="app">
@yield('content')
</div>
<script src="{{ asset('voktabazar/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('voktabazar/js/clean-blog.min.js') }}"></script>
</body>
</html>
