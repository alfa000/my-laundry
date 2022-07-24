<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>My Laundry | @yield('title')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,500;0,600;0,700;1,200;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/app.css') }}">

</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand font-weight-bold" href="{{ route('home') }}">My Laundry</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
              </ul>

              <ul class="navbar-nav my-2 my-lg-0">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            <span class="nav-text">Hi, {{Auth::User()->nama}}</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <span class="nav-text">{{ __('Logout') }}</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endauth
              </ul>
            </div>
        </nav>
    </header>

    <div class="d-flex">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="min-height: calc(100vh - 56px);width: 250px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
              <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
              <span class="fs-4">{{ Auth::User()->nama }}</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
              <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link text-white" aria-current="page">
                  <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                  Dashboard
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">
                  <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                  Pemesanan
                </a>
              </li>
              <li>
                <a href="{{ route('karyawan.index') }}" class="nav-link text-white">
                  <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                  Karyawan
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">
                  <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                  Jenis Cuci
                </a>
              </li>
            </ul>
        </div>

        <section id="content" class="w-100">
            @yield('content')
        </section>
    </div>

    {{-- <footer>
        &copy; My Laundry {{ date('Y') }}
    </footer> --}}

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

    @stack('scripts')
</body>
</html>
