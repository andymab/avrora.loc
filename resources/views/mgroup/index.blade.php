@extends('layouts.layout',[
      'title'=>'Главная страница']
      )

@section('content')
      <section class="text-center bg-light features-icons">
            <div class="container">
                  <!-- Start: Product_elements -->
                  <ul class="Product_elements">
                        @foreach($mgroups as $mgroup)
                        <li class="Product_element"><a class="m-auto Product-block transition" href="{{route('catalog.index',['mgroup_id'=>$mgroup->id])}}"><img class="Product-img" src="{{ Storage::url('media/'. $mgroup->img) }}">
                                    <p class="Product-button">{{$mgroup->name}}</p>
                              </a></li>
                        @endforeach
                  </ul><!-- End: Product_elements -->
            </div>
      </section>
@endsection