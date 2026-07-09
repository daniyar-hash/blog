<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edica :: Home</title>
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="assets/vendors/aos/aos.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/vendors/jquery/jquery.min.js"></script>
    <script src="assets/js/loader.js"></script>
</head>
<body class="d-flex flex-column min-vh-100">


    <div class="edica-loader"></div>
  <header class="edica-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="/">
                <img src="assets/images/logo.svg" alt="Edica">
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav" aria-controls="edicaMainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="edicaMainNav">
                <!-- 1. Основные ссылки по центру -->
                <ul class="navbar-nav mx-auto align-items-center">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="blogDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog</a>
                        <div class="dropdown-menu" aria-labelledby="blogDropdown">
                            <a class="dropdown-item" href="blog.html">Blog Archive</a>
                            <a class="dropdown-item" href="blog-single.html">Blog Post</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                            <a class="dropdown-item" href="404.html">404</a>
                            <a class="dropdown-item" href="coming-soon.html">Coming Soon</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                </ul>

                <!-- 2. Правая часть (Язык, Скачать и Авторизация объединены вместе) -->
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="#">
                            <span class="flag-icon flag-icon-squared rounded-circle flag-icon-gb mr-1"></span> Eng
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Download</a>
                    </li>

                    @guest
                        @if(Route::has('login'))
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Войти</a>
                            </li>
                        @endif
                        @if(Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Регистрация</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post" class="m-0">
                                @csrf
                                <input type="submit" class="btn btn-outline-primary btn-sm" value="Выйти">
                            </form>
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



    <script src="assets/vendors/popper.js/popper.min.js"></script>
    <script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/vendors/aos/aos.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        AOS.init({
            duration: 1000
        });
      </script>
</body>

</html>