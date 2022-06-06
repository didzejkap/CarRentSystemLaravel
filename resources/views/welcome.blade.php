<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SilesiaRent</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">
</head>

<body class="antialiased">


    <nav class="navbar navbar-expand-lg fixed-top navbar-scroll">
        <div class="container">
            <h2>SilesiaRent</h2>
            <button class="navbar-toggler ps-0" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon d-flex justify-content-start align-items-center">
                    <i class="fas fa-bars"></i>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample01">
                @if (Route::has('login'))
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ml-auto">
                    @auth
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="{{ url('/home') }}">Panel użytkownika</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('login') }}">Zaloguj</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('register') }}">Rejestracja</a>
                    </li>
                    @endif
                    @endauth
                </ul>
            </div>
            @endif
        </div>
    </nav>



    <div class="bg">
        <div class="zawartosc">
            Wynajmij samochód już teraz!
        </div>
        <div class="zawartosc2">Posiadamy flote samochodów premium spełniające oczekiwania każdego klienta</div>

    </div>

    <div class="samochody-div">
        <div class="napis-samochody">Przykładowe Samochody</div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12 border">
                <!-- Start Single Feature -->
                <div>
                    <h3>Audi A3</h3>
                    <img src="/img/audi.jpg" class="img-fluid">
                    <p>Paliwo: Benzyna</p>
                    <p>Ilość miejsc: 5</p>
                    <p>Cena za 7 dni: 400 PLN</p>

                </div>
                <!-- End Single Feature -->
            </div>
            <div class="col-lg-4 col-md-6 col-12 border">
                <!-- Start Single Feature -->
                <div>
                    <h3>BMW 3</h3>
                    <img src="img/bmw3.jpeg" class="img-fluid">
                    <p>Paliwo: Benzyna</p>
                    <p>Ilość miejsc: 5</p>
                    <p>Cena za 7 dni: 600 PLN</p>

                </div>
                <!-- End Single Feature -->
            </div>
            <div class="col-lg-4 col-md-6 col-12 border">
                <!-- Start Single Feature -->
                <div>
                    <h3>Mercedes C class</h3>
                    <img src="img/c.jpeg" class="img-fluid">
                    <p>Paliwo: Benzyna</p>
                    <p>Ilość miejsc: 5</p>
                    <p>Cena za 7 dni: 500 PLN</p>

                </div>
                <!-- End Single Feature -->
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <div class="stopka">
    Projekt Zaliczeniowy Kacper Niedbał
  </div>

</body>

</html>