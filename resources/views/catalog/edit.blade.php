@extends('layouts.layout',[
    'title'=>'Редактировать карточку'
    ])
@section('content')
<section class="text-center bg-light mt-4">
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('catalog.update',[$element->id]) }}" method="POST" enctype="multipart/form-data" class="catalog edit">
                    @method('PATCH')
                    @include('catalog.parts.form')
                </form>
            </div>
        </div>
    </div>
</section>
@endsection