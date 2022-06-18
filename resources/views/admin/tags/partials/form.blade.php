<div class="form-group">
    {{ Form::label('name', 'Nombre') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la etiqueta.']) }}
    @error('name')
        <span class="text-danger">* {{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {{ Form::label('color_id', 'Color') }}
    {{ Form::select('color_id', $colors->pluck('traduction', 'id')->toArray(), null, ['class' => 'form-control']) }}
    @error('color_id')
        <span class="text-danger">* {{ $message }}</span>
    @enderror
</div>
