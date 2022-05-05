@csrf
<div class="card m-auto" style="width: 30rem;display:flex; flex-direction:column; align-items:center">
    @if(isset($element->img) && $element->img)
    <div class="w-100 m-auto">
        <div class="box-image m-auto" style="background-image:url(<?= Storage::url('media/' . $element->img) ?>);width:200px;height:200px;"></div>
    </div>
    @endif
    <div class="card-body w-100 create_edit_form" style=" align-items:left">
        <div class="mb-3">
            <input type="file" class="form-control w-100" name="img">
        </div>
        <div class="mb-3 d-flex align-items-center justify-content-between">
            <label for="name" class="form-label p-2 m-0">Наименование</label>
            <div class="input-group has-validation">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required value="{{ old('name') ?? $element->name ?? ''}}">
                @error('name')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 d-flex align-items-center justify-content-between">
            <label for="descr" class="form-label p-2 m-0">Описание</label>
            <div class="input-group has-validation">
                <textarea name="descr" id="descr" rows="7" class="form-control @error('descr') is-invalid @enderror">{{old('descr') ?? $element->descr ?? ''}}</textarea>
                @error('descr')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>


        <a href="{{ route('mgroup.index')}}" class="btn btn-outline-success btn-sm">В каталог</a>
        <button type="submit" class="btn btn-outline-primary btn-sm">Сохранить</button>
    </div>
</div>