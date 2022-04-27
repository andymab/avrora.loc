@extends('layouts.layout')

@section('content')
      <section class="text-center bg-light features-icons">
            <div class="container">
                  <!-- Start: Product_elements -->
                  <ul class="Product_elements">
                        @foreach($mgroups as $mgroup)
                        <li class="Product_element"><a class="m-auto Product-block transition" href="/catalog/{{$mgroup->id}}?metal=1"><img class="Product-img" src="/media/products/catalogs/{{$mgroup->img}}">
                                    <p class="Product-button">{{$mgroup->name}}</p>
                              </a></li>
                        @endforeach
                  </ul><!-- End: Product_elements -->
            </div>
      </section>
@endsection