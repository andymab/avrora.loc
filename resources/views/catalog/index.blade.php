@extends('layouts.layout',[
'title'=>isset($mgroup) ? $mgroup->name.' | Каталог' : "Результат поиска"
])

@section('content')
<section class="text-center bg-light">
  <div class="container">
    @if($search)
    <h2>Результаты запроса</h2>
    @if(sizeof($catalogs))
    <p>По Вашему запросу <strong>{{ $search }}</strong> найдено: {{sizeof($catalogs)}} изд.</p>
    @else
    <p>По Вашему запросу <strong>{{ $search }}</strong> ничего не найдено</p>
    <a href="/" class="btn btn-outline-primary">Отобразить все посты</a>
    @endif
    @else
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">
          <svg class="bi" width="22" height="22" fill="currentColor">
            <use xlink:href="{{asset('img/bootstrap-icons.svg')}}#house-door-fill" />
          </svg>
        </a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link {{ filter_input(INPUT_GET,'metal') == 1 ? 'active' : '' }}" href="{{route('catalog.index',['mgroup_id'=>$mgroup->id,'metal'=>1])}}">Золото</a></li>
            <li class="nav-item"><a class="nav-link {{ filter_input(INPUT_GET,'metal') == 2 ? 'active' : '' }}" href="{{route('catalog.index',['mgroup_id'=>$mgroup->id,'metal'=>2])}}">Серебро</a></li>
          </ul>
        </div>
      </div>
    </nav>
    @endif

    <!-- Start: Product_elements -->
    <ul class="Product_elements pt-4 pb-5">
      @foreach($catalogs as $catalog)
      <li class="Product_element"><a class="m-auto Product-block transition" href="{{ route('catalog.show',[$catalog->id])}}">
          <div class="box-image" style="background-image:url(<?= Storage::url('media/' . $catalog->img) ?>)"></div>
        </a>
        <div class="spec" style="text-align: center;"><small style="margin-right: 1rem;">арт:</small><span>{{$catalog->articul}}</span></div>
      </li>
      @endforeach
    </ul><!-- End: Product_elements -->
  </div>
</section>
@endsection