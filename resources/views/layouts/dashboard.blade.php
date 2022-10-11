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
    {{-- NEW NAV TRY --}}
    <div class="container-fluid overflow-hidden">
        <div class="row vh-100 overflow-auto">
            <div class="col-12 col-sm-3 my-nav col-xl-2 px-sm-2 px-0 d-flex nav-orange sticky-top">
                <div class="d-flex flex-sm-column flex-row flex-grow-1 align-items-center align-items-sm-start px-3 pt-2 text-white">
                    <div class="admin-head">
                        <div class="delive-logo">
                            <a href="/">DeliveBoo</a> 
                        </div>
                        <div class="admin-logo">
                            Admin Panel
                        </div>
                    </div>
                    <ul class="nav my-bg col-deliveboo flex-sm-column flex-row flex-nowrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.home') }}">
                                <i class="fa-solid fa-user"></i>
                               <span class="name-off"> Profilo Ristorante</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.dishes.index') }}">
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> --}}
                                <i class="fa-solid fa-utensils"></i>
                                <span class="name-off">Tutti i Piatti</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.dishes.create') }}">
                                <i class="fa-solid fa-plus"></i>
                                <span class="name-off">Crea Nuovo Piatto</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.orderList') }}">
                                <i class="fa-solid fa-list-timeline"></i>
                                <span class="name-off">Cronologia Ordini</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.chart') }}">
                                <i class="fa-solid fa-list-timeline"></i>
                                <span class="name-off">Andamento Negozio</span>
                            </a>
                        </li>
                        <li class="nav-item d-md-none">
                            <a class="out-btn" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col d-flex flex-column h-sm-100">
                <main class="row overflow-auto my-dash">
                    {{-- HEAD --}}
                    <nav class="navbar navbar-expand-md flex-md-nowrap p-0 nav-deliveboo">
                        <ul class="navbar-nav px-3 ml-auto">
                            <li class="nav-item my-log-btn">
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
    </div>
    {{-- END NEW NAV TRY --}}

    
</body>
</html>

<style>
    body{
        font-family: 'IBM Plex Sans', sans-serif;
        box-sizing: border-box;
    }

    .nav-orange{
        background-color: #ffba00 !important;
    }

    .my-bg{
        background-color: inherit !important;
    }

    .my-dash{
        flex-direction: column;
        padding: 1rem;
    }

    .my-height{
        height: 100vh;
    }
    /* ASIDE */
    .col-deliveboo{
        background-color: #ffba00;
    }

    ul{
        line-height: 3rem;
    }

    .name-off,.nav-link{
        color: white !important;
    }

    .col-deliveboo li a{
        color: white;
    }

    .col-deliveboo li:hover a{
        color: #ffba00 !important;
        background-color: white;
        border-radius: 30px;
        
    }

    .col-deliveboo li:hover .name-off{
        color: #ffba00 !important;
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
    .admin-head a{
            text-decoration: none;
            color: white;
        }
    .delive-logo{
        font-family: 'Pacifico', cursive;
        color: white;
        padding: 0 1rem;
        font-size: 2.2rem;
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
        color: #ffba00 !important;
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

    /* ORDERS */
    .order-title{
        margin-bottom: 1rem;
    }

    .my-orders{
        background-color: #f4f4f4;
        box-shadow: 6px 10px 6px rgba(116, 116, 116, 0.25);
        padding: 1.5rem;
        width: 50%;
        border-radius: 25px; 
    }

    @media screen and (max-width: 560px) {
        /* HEAD */
    .delive-logo{
        font-size: 1.5rem;
    }
    .admin-logo{
        font-size: 0.8rem;
        padding-left: 2rem !important;
    }

    /* LINKS */
    .name-off{
        display: none;
    }

    .my-label{
        width: 50%;
    }

    .my-log-btn{
        display: none;
    }
    /* PAGINE */

    .my-orders{
        width: 90%;
    }
    .order-title{
        text-align: center;
        margin-top: 1.2rem;
    }

    .my-w-90{
        width: 95% !important;
        margin: 1.2rem 0;
    }
}
@media screen and (max-width: 1235px) {
    .my-label{
        width: 40%;
    }
}

</style>

