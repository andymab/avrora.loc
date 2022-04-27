<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <meta name="description" content="Локальный сервер для Аврора ЮД">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css?h=c8c71a7640c0fd07290ef2dca51bdf40">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic">
    <link rel="stylesheet" href="/assets/fonts/fontawesome-all.min.css?h=a24cb0112e51902b6b3ed4606a7cd727">
    <link rel="stylesheet" href="/assets/fonts/font-awesome.min.css?h=a24cb0112e51902b6b3ed4606a7cd727">
    <link rel="stylesheet" href="/assets/fonts/fontawesome5-overrides.min.css?h=a24cb0112e51902b6b3ed4606a7cd727">
    <link rel="stylesheet" href="/assets/css/styles.css?h=52042a6bc3009ff27a370f740ddb7f0a">
    <link rel="stylesheet" href="/assets/css/Navbar-Right-Links.css?h=52042a6bc3009ff27a370f740ddb7f0a">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand bg-light navigation-clean">
        <div class="container"><a class="navbar-brand primary_color" href="#" style="color: rgb(153,89,5);">Аврора</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"></button>
            <div class="collapse navbar-collapse" id="navcol-1"><a class="btn ms-auto primary_color" role="button" href="#">Войти</a></div>
        </div>
    </nav>
    <header class="text-center text-white masthead" style="background:url('/assets/img/avr001.jpg?h=f87cee285def774511a9180f05d3aa1d')no-repeat center center;background-size:cover;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto position-relative">
                    <form>
                        <div class="row">
                            <div class="col-12 col-md-10 mb-2 mb-md-0"><input class="form-control form-control-lg primary_color" type="search" placeholder="Поиск по части Артикула ..."></div>
                            <div class="col-12 col-md-2"><button class="btn btn-lg bg_primary_color text-white" type="submit"><i class="fa fa-search"></i></button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>

    @yield('content')


    <script src="/assets/bootstrap/js/bootstrap.min.js?h=5488c86a1260428f0c13c0f8fb06bf6a"></script>
</body>

</html>