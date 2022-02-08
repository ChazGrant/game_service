<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 text-secondary">Главная</a></li>
                <li><a href="/about" class="nav-link px-2 text-white">О нас</a></li>
                <li><a href="/reviews" class="nav-link px-2 text-white">Отзывы</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">
                @if(auth()->check())
                    <a style="text-decoration: none; color: white" href="/profile"><button type="button" class="btn btn-outline-light me-2">{{ auth()->user()->name }}</button></a>
                    <a style="text-decoration: none; color: white" href="/logout"><button type="button" class="btn btn-warning">Выход</button></a>
                @else
                    <a style="text-decoration: none; color: white" href="/auth"><button type="button" class="btn btn-outline-light me-2">Вход</button></a>
                    <a style="text-decoration: none; color: white" href="/reg"><button type="button" class="btn btn-warning">Регистрация</button></a>
                @endif

            </div>
        </div>
    </div>
</header>
<div class="container mt-5">
    @yield('main_content')
</div>
<footer class="container-fluid bg-dark text-white w-100 mb-sm-0 py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2">About</a></li>
    </ul>
    <p class="text-center">© 2022 Company, Inc</p>
</footer>
</body>
</html>
