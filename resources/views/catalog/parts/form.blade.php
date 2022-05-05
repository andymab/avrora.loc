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
            <label for="articul" class="form-label m-0 p-2 ">Артикул</label>
            <div class="input-group has-validation">
                <input type="text" class="form-control @error('articul') is-invalid @enderror" name="articul" id="articul" required value="{{ old('articul') ?? $element->articul ?? ''}}">
                @error('articul')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
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
            <label for="metal" class="form-label p-2 m-0">Метал</label>
            <div class="input-group has-validation">
                <select class="form-control @error('metal') is-invalid @enderror" name="metal" id="metal" required>
                    <option value="">Выберите метал</option>
                    <option value="1" <?= isset($element->metal) ? ($element->metal === 1 ? 'selected="selected"' : '') : ""; ?>>Золото</option>
                    <option value="2" <?= isset($element->metal) ? ($element->metal === 2 ? 'selected="selected"' : '') : ''; ?>>Серебро</option>
                </select>
                @error('metal')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 d-flex align-items-center justify-content-between">
            <label for="mgroup_id" class="form-label p-2 m-0">Группа</label>
            <div class="input-group has-validation">
                <select class="form-control @error('mgroup_id') is-invalid @enderror" name="mgroup_id" id="mgroup_id" required>
                    <option value="">Выберите группу изделий</option>
                    @foreach($mgroups as $group)
                    <option value="{{$group->id}}" <?= isset($element->mgroup_id) ? ($group->id === $element->mgroup_id ? 'selected="selected"' : '') : ''; ?>>{{$group->name}}</option>
                    @endforeach
                </select>
                @error('mgroup_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 d-flex align-items-center justify-content-between">
            <label for="id1c" class="form-label p-2 m-0 w-30">номер в базе 1с:</label>
            <div class="input-group has-validation">
                <input type="text" class="form-control  @error('id1c') is-invalid @enderror" name="id1c" id="id1c" required value="{{ old('id1c') ?? $element->id1c ?? ''}}">
                @error('id1c')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 d-flex align-items-center justify-content-between">
            <label for="trymetal" class="form-label p-2 m-0">Проба</label>
            <div class="input-group has-validation">
                <input type="text" class="form-control @error('trymetal') is-invalid @enderror" name="trymetal" id="trymetal" required value="{{old('trymetal') ?? $element->trymetal ?? ''}}">
                @error('trymetal')
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


        @if(isset($element->mgroup_id))
        <a href="{{ route('catalog.index',['mgroup_id'=>$element->mgroup_id])}}" class="btn btn-outline-success btn-sm">В каталог</a>
        @endif
        <button type="submit" class="btn btn-outline-primary btn-sm">Сохранить</button>
    </div>
</div>