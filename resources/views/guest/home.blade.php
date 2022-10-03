<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>
        @guest
        <h1>guest</h1>
        @endguest
        @auth
        <script>
            window.userLogged = true;
        </script>
        @endauth
    <div id="root"></div>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>

{{-- @extends('layouts.app')

@section('content')
   <div>
        <div id="root"></div>
        Home guest php laravel
   </div>
@endsection --}}
