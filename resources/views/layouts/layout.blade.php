<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Локальный каталог для Аврора ЮД">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Document'}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css?h=c8c71a7640c0fd07290ef2dca51bdf40"> -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic"> -->
    <!-- <link rel="stylesheet" href="/assets/fonts/fontawesome-all.min.css?h=a24cb0112e51902b6b3ed4606a7cd727">
    <link rel="stylesheet" href="/assets/fonts/font-awesome.min.css?h=a24cb0112e51902b6b3ed4606a7cd727">
    <link rel="stylesheet" href="/assets/fonts/fontawesome5-overrides.min.css?h=a24cb0112e51902b6b3ed4606a7cd727">-->
    <link rel="stylesheet" href="{{ asset('css/header.css')}}">
    <link rel="stylesheet" href="{{ asset('css/styles.css')}}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png')}}" type="image/x-icon">
</head>

<body>
    @include('layouts.parts.navbarAvrora')
    <header class="text-center p-4 p-md-5 mb-4 rounded" style="background:url('<?= asset('img/avr001.jpg') ?>')no-repeat center center;background-size:cover;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto position-relative">
                    <form action="<?= route('catalog.index') ?>" method="GET">
                        <div class="row">
                            <div class="col-12 col-md-10 mb-2 mb-md-0"><input name="search" class="form-control form-control-lg primary_color" type="search" placeholder="Поиск по части Артикула ..."></div>
                            <div class="col-12 col-md-2">
                                <button class="btn " style="background-color: #9b6227;color: wheat;border-radius: 5px;" type="submit">
                                    <svg class="bi" width="32" height="32" fill="currentColor">
                                        <use xlink:href="{{asset('img/bootstrap-icons.svg')}}#search" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{$error}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endforeach
        @endif
    </div>
    @yield('content')
    <script src="{{ asset('js/ext.js')}}"></script>
    <!-- <script src="/assets/bootstrap/js/bootstrap.min.js?h=5488c86a1260428f0c13c0f8fb06bf6a"></script> -->
</body>

</html>