@extends('layouts.layout')

@section('content')
<section class="text-center bg-light">
  <div class="container">

    <!-- Start: Navbar Right Links -->
    <nav class="navbar navbar-light navbar-expand-md py-3">
      <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon" style="background: var(--bs-orange);"><i class="fas fa-home"></i></span><span class="navbar-brand-title">{{$catalogs[0]->mgroup_name}}</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-2">

          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link {{ filter_input(INPUT_GET,'metal') == 1 ? 'active' : '' }}" href="?metal=1">Золото</a></li>
            <li class="nav-item"><a class="nav-link {{ filter_input(INPUT_GET,'metal') == 2 ? 'active' : '' }}" href="?metal=2">Серебро</a></li>
          </ul>
        </div>
      </div>
    </nav><!-- End: Navbar Right Links -->


    <!-- Start: Product_elements -->
    <ul class="Product_elements pt-4 pb-5">
      @foreach($catalogs as $catalog)
      <li class="Product_element"><a class="m-auto Product-block transition" href="/catalog/show/{{$catalog->id}}">
          <div class="box-image" style="background-image:url(/media/<?=$catalog->img=='' ? 'no-image.png' : $catalog->img?>) ;"></div>
        </a>
        <div class="spec" style="text-align: left;padding-left: 1rem;"><small style="margin-right: 1rem;">арт:</small><span>{{$catalog->articul}}</span></div>
      </li>
      @endforeach
    </ul><!-- End: Product_elements -->
  </div>
</section>
@endsection