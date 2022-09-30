<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/back.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;600;700&family=Pacifico&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">

        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar py-4 col-deliveboo">
                <div class="sidebar-sticky">

                    <div class="admin-head">
                        <div class="delive-logo">
                            DeliveBoo
                        </div>
                        <div class="admin-logo">
                            Admin Panel
                        </div>
                    </div>

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.home') }}">
                                <i class="fa-solid fa-user"></i>
                                Profilo Ristorante
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.dishes.index') }}">
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> --}}
                                <i class="fa-solid fa-utensils"></i>
                                Tutti i Piatti
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.dishes.create') }}">
                                <i class="fa-solid fa-plus"></i>
                                Crea Nuovo Piatto
                            </a>
                        </li>

                    </ul>

                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 py-4">

                {{-- HEAD --}}
                <nav class="navbar navbar-expand-md flex-md-nowrap p-0 nav-deliveboo">
                    <ul class="navbar-nav px-3 ml-auto">
                        <li class="nav-item">
                            <a class="nav-link out-btn" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
                {{-- END HEAD --}}

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>

<style>
    body{
        font-family: 'IBM Plex Sans', sans-serif;
        box-sizing: border-box;
    }
    /* ASIDE */
    .col-deliveboo{
        background-color: #ffba00;
        height: 100vh;
    }

    ul{
        line-height: 3rem;
    }
    .col-deliveboo li a{
        color: white;
    }

    .col-deliveboo li a:hover{
        color: #ffba00;
        background-color: white;
        border-radius: 30px;
    }
    .col-deliveboo li a i{
        font-size: 1.3rem;
        margin-right: 0.2rem;
    }

    /* LOGO */
    .admin-head{
        margin: 2rem 0;
    }

    .delive-logo{
        font-family: 'Pacifico', cursive;
        color: white;
        padding: 0 1rem;
        font-size: 2.2rem;
    }

    .admin-logo{
        color: white;
        padding-left: 5rem;
    }

    /* NAV */
    .nav-deliveboo{
        margin-bottom: 2rem;
    }

    .my-logo{
        padding: 0;
        color: #ffba00;
        font-family: 'Pacifico', cursive;
        font-size: 2rem;
    }

    .out-btn{
        background-color: #ffba00;
        color: white;
        padding: 1rem 1rem;
        display: inline;
    }

    .out-btn:hover{
        background-color: white;
        border: 1px solid #ffba00;
        color: #ffba00;
        padding: 1rem 1rem;
    }

    /* BTN */
    .btn-deliveboo{
        background-color: #ffba00;
        color: white;
        padding: 0.5rem 1.2rem;
    }

    .btn-deliveboo:hover{
        background-color: white;
        border: 1px solid #ffba00;
        color: #ffba00;
        padding: 0.5rem 1.2rem;
    }

    /* CSS PAGINE */
    .welcome-msg{
        color: #d0d0d0;
        font-weight: 400;
    }

    .nome-utente{
        font-weight: 600;
        color: #ffba00;
    }

    h1{
        font-weight: 600;
        color: #ffba00;
        margin-bottom: 2rem;
    }

</style>
