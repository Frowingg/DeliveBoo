<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://js.braintreegateway.com/web/dropin/1.29.0/js/dropin.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>
        {{-- @guest
        <h1>guest</h1>
        @endguest --}}
        @auth
        <script>
            window.userLogged = true;
        </script>
        @endauth
    <div id="root"></div>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
