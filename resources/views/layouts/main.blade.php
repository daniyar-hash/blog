<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/all.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('assets/vendors/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }} "></script>
    <script src="{{ asset('assets/js/loader.js') }}"></script>
</head>
<body class="d-flex flex-column min-vh-100">
     @if(session('success'))
        <div class="alert alert-primary" role="alert">
        {{ session('success')}}
        </div>
      @endif

<div class="edica-loader"></div>
  <header class="edica-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{ route('home')}}">
                <img src="{{asset('assets/images/logo.svg') }}" alt="Edica">
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav" aria-controls="edicaMainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="edicaMainNav">
                <!-- 1. Основные ссылки по центру -->
                <ul class="navbar-nav mx-auto align-items-center">
                  
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('home')}}"  aria-haspopup="true" aria-expanded="false">Блог</a>
                       
                    </li>
                     <li class="nav-item ">
                        <a class="nav-link" href="{{ route('category.index')}}" >Категории</a>
                       
                    </li>
                  
                </ul>
  <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                       Войти
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                      Регистрация
                                    </a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                            <a  class="nav-link" href="{{ route('personal.dashboard')}}">
                                Личный Кабинет
                            </a>

                        </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown"
                                   class="nav-link dropdown-toggle"
                                   href="#"
                                   role="button"
                                   data-bs-toggle="dropdown"
                                   aria-haspopup="true"
                                   aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item"
                                       href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                        Выйти
                                    </a>

                                    <form id="logout-form"
                                          action="{{ route('logout') }}"
                                          method="POST"
                                          class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
            </div>
        </nav>
    </div>
</header>

<main class="blog flex-shrink-0">
   @yield('content')
</main>
    <footer class="app-footer mt-auto py-3 bg-dark text-white">
        <div class="container text-center">
            <strong>Blog Laravel</strong>
        </div>
    </footer>
    <script src=" {{ asset('assets/vendors/popper.js/popper.min.js') }}"></script>
    <script src=" {{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/aos/aos.js') }}"></script>
    <script src=" {{asset('assets/js/main.js') }}"></script>
    <script>
        AOS.init({
            duration: 1000
        });
      </script>
</body>

</html>