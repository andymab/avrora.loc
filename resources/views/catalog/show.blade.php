@extends('layouts.layout',[
    'title'=> $element_catalog->mgroup_name.': '.$element_catalog->articul.' | Карточка'
    ])
@section('content')
<?php

use Illuminate\Support\Carbon;
//var_dump($element_catalog);die;
?>
<section class="text-center bg-light mt-4">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card m-auto" style="width: 20rem;display:flex; flex-direction:column; align-items:center;">
                    
                    <div class="box-image" style="background-image:url(<?= $element_catalog->img ? Storage::url('media/' . $element_catalog->img ) :'' ?>);width:200px;height:200px;"></div>
                    
                    <div class="card-body" style=" align-items:left">
                        <h5 class="card-title font-monospace">{{ $element_catalog->articul }}</h5>
                        <p class="text-start m-0"> <span class="text-muted">наименование:</span> {{ $element_catalog->name }}</p>
                        <p class="text-start m-0"> <span class="text-muted">метал:</span> {{ $element_catalog->metal_name }}</p>
                        <p class="text-start m-0"> <span class="text-muted">проба:</span> {{ $element_catalog->trymetal }}</p>
                        <p class="text-start m-0"><span class="text-muted">группа:</span> {{ $element_catalog->mgroup_name }}</p>
                        <p class="text-start m-0"><span class="text-muted">номер в базе 1с:</span> {{ $element_catalog->id1c }}</p>
                        <p class="text-start m-0"><span class="text-muted">описание:</span> {{ $element_catalog->descr }}</p>
                        <p class="text-start m-0"><span class="text-muted">создана:</span>
                            {{ Carbon::parse($element_catalog->created_at)->diffForHumans()}}
                        </p>
                        <p class="text-start mb-0"><span class="text-muted">обновил:</span> {{ Carbon::parse($element_catalog->updated_at)->diffForHumans() }}</p>
                        <p class="text-start "><span class="text-muted">Автор:</span> </p>
                        <a href="{{ route('catalog.index',['mgroup_id'=>$element_catalog->mgroup_id])}}" class="btn btn-outline-success btn-sm">В каталог</a>
                        @auth
                        <a href="{{ route('catalog.edit',[$element_catalog->id])}}" class="btn btn-outline-primary btn-sm">Редактировать</a>
                        <form action="{{ route('catalog.destroy',$element_catalog->id)}}" method="POST" enctype="multipart/form-data" style="display:inline-block" onclick="if( confirm('точно хотите удалить карточку')){return true} else {return false}">
                            @csrf
                            @method('DELETE')
<input type="submit" class="btn btn-outline-danger btn-sm" value="Удалить">
                        </form>
                        @endauth
                       </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection