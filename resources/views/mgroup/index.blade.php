@extends('layouts.layout',[
'title'=>'Главная страница']
)

@section('content')
<section class="text-center bg-light features-icons">
      <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <div class="container-fluid">
                        <a class="navbar-brand " href="/">Каталог изделий</a>
                  </div>
            </nav>
            <!-- Start: Product_elements -->
            <ul class="Product_elements pb-5">
                  @foreach($mgroups as $mgroup)
                  <li class="Product_element">
                        <a class="m-auto Product-block transition"
                              href="{{route('catalog.index',['mgroup_id'=>$mgroup->id])}}">
                              <div class="box-image"
                                    style="background-image:url(<?= Storage::url('media/' . $mgroup->img) ?>)"></div>
                        </a>
                        <div class="spec" style="text-align: center;">
                              <span>
                                    {{$mgroup->name}}
                              </span>
                        </div>
                        @if (auth()->user() and auth()->user()->is_admin)
                         <a href="{{route('mgroup.show',[$mgroup->id])}}">Редактировать</a>   
                        @endif
                  </li>
                  @endforeach
            </ul><!-- End: Product_elements -->
      </div>
</section>
@endsection