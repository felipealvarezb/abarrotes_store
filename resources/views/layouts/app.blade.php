<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    <title>@yield('title', __('Online Store'))</title>
</head>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4 fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">{{ __('Online Store') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"> <span
                    class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="{{ route('home.index') }}">{{ __('Home') }}</a>
                    <a class="nav-link active" href="{{ route('product.index') }}">{{ __('Products') }}</a>
                    <a class="nav-link active" href="{{ route('cart.index') }}">{{ __('Cart') }}</a>
                    <a class="nav-link active" href="{{ route('home.about') }}">{{ __('About') }}</a>
                    <div class="vr bg-white mx-2 d-none d-lg-block"></div>
                    @guest
                    <a class="nav-link active" href="{{ route('login') }}">{{ __('Login') }}</a>
                    <a class="nav-link active" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @else
                    <div>
                        <a class="nav-link active"
                            href="{{ route('myaccount.orders') }}">{{ Auth::user()->getName() }}</a>
                        <a class="nav-link active" href="#">${{ Auth::user()->getBalance() }}</a>
                    </div>
                    <form id="logout" action="{{ route('logout') }}" method="POST">
                        <a role="button" class="nav-link active"
                            onclick="document.getElementById('logout').submit();">{{ __('logout') }}</a>
                        @csrf
                    </form>
                    @endguest
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          {{  __('language')  }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @include('partials/language_switcher')
                        </ul>
                    </li>
                </div>
            </div>
        </div>
    </nav>
    <header class="masthead bg-primary text-white text-center py-4 main">
        <div class="container d-flex align-items-center flex-column">
            <h2>@yield('subtitle', __('Laravel') )</h2>
        </div>
    </header>
    <!-- header -->
    <div class="container my-4 main">
        @yield('content')
    </div>
    <!-- footer -->
    <div class="copyright py-4 text-center text-white fixed-bottom">
        <div class="container">
            <small>
                @yield('footer', 'Footer')
            </small>
        </div>
    </div>
    <!-- footer -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>