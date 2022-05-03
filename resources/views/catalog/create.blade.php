@extends('layouts.layout')

@section('content')
<section class="text-center bg-light">
    <div class="container">
        <form action="{{ route('catalog.store') }}" class="needs-validation" novalidate method="POST" enctype="multipart/form-data">
            @include('catalog.parts.form')
        </form>
    </div>
</section>
@endsection