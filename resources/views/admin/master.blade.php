<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed" id="body">
<div id="app">
    @yield('content')
</div>
   <script>
       function collapseMe(){
           if (document.getElementById('body').className !== 'sb-sidenav-toggled'){
               document.getElementById('body').classList = 'sb-sidenav-toggled';
           }else {
               document.getElementById('body').classList = 'sb-nav-fixed';
           }
       }
   </script>
</body>
</html>
