@extends('layouts.layout',[
    'title'=> $element->name.' | Карточка'
    ])
@section('content')
<?php

use Illuminate\Support\Carbon;
?>
<section class="text-center bg-light mt-4">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card m-auto" style="width: 20rem;display:flex; flex-direction:column; align-items:center;">
                    <div class="box-image" style="background-image:url(<?= $element->img ? Storage::url('media/' . $element->img ) :'' ?>);width:200px;height:200px;"></div>
                    <div class="card-body" style=" align-items:left">
                        <h5 class="card-title font-monospace">{{ $element->name }}</h5>
                        <p class="text-start m-0"><span class="text-muted">описание:</span> {{ $element->descr }}</p>
                        <p class="text-start m-0"><span class="text-muted">создана:</span>
                            {{ Carbon::parse($element->created_at)->diffForHumans()}}
                        </p>
                        <p class="text-start mb-0"><span class="text-muted">обновил:</span> {{ Carbon::parse($element->updated_at)->diffForHumans() }}</p>
                        <p class="text-start "><span class="text-muted">Автор:</span> </p>
                        <a href="{{ route('mgroup.index')}}" class="btn btn-outline-success btn-sm">В каталог</a>
                        <a href="{{ route('mgroup.edit',[$element->id])}}" class="btn btn-outline-primary btn-sm">Редактировать</a>
                        <form action="{{ route('mgroup.destroy',$element->id)}}" method="POST" enctype="multipart/form-data" style="display:inline-block" onclick="if( confirm('точно хотите удалить карточку')){return true} else {return false}">
                            @csrf
                            @method('DELETE')
<input type="submit" class="btn btn-outline-danger btn-sm" value="Удалить">
                        </form>
                       </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection