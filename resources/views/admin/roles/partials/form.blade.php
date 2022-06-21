<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('description', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Nombre del rol', 'required']) !!}
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <div class="form-group">
        {!! Form::label('permissions', 'Listado de permisos') !!}
        <div>
            @foreach ($permissions as $permission)
                <div>
                    <label>
                        {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                        {{ $permission->description }}
                    </label>
                </div>
            @endforeach
        </div>
        @error('permissions')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
