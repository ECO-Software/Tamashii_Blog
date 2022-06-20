<div class="form-group">
    {!! Form::label('title', 'Título') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título del post.']) !!}
    @error('title')
        <span class="text-danger" role="alert">
            <strong>* {{ $message }}</strong></span>
    @enderror
</div>
<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset($post->image)
            <img id="picture" src="{{ Storage::url($post->image->url) }}" alt="">
            @else
            <img id="picture" src="{{ Storage::url('posts/notfound.png') }}" alt="">
            @endisset
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('image', 'Imagen que se mostrará en el post.') !!}
            {!! Form::file('image', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
            <ul class="mt-5">
                <li>Seleccionar una imagen guardada en su computadora.</li>
                <li>Ajustar el tamaño y rotarla si necesario.</li>
                <li>Recortarla a una imagen cuadrada de exactamente 600x600 pixeles.</li>
                <li>Guardarla en su computadora para enviarla en línea o para imprimirla.</li>
                <li>Evitar imagenes con mucho blanco ya que el título podría no visualizarse de manera correcta.</li>
            </ul>
            @error('image')
                <span class="text-danger" role="alert">
                    <strong>* {{ $message }}</strong></span>
            @enderror
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('extract', 'Extracto') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el extracto del post.']) !!}
    @error('extract')
        <span class="text-danger" role="alert">
            <strong>* {{ $message }}</strong></span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('body', 'Cuerpo') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el cuerpo del post.']) !!}
    @error('body')
        <span class="text-danger" role="alert">
            <strong>* {{ $message }}</strong></span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('category_id', 'Categoría') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Seleccione la categoría del post.']) !!}
    @error('category_id')
        <span class="text-danger" role="alert">
            <strong>* {{ $message }}</strong></span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('tags', 'Tags') !!}
    <div>
        @foreach ($tags as $tag)
            <label class="mr-2">
                {!! Form::checkbox('tags[]', $tag->id) !!}
                {{ $tag->name }}
            </label>
        @endforeach
    </div>
    @error('tags')
        <span class="text-danger" role="alert">
            <strong>* {{ $message }}</strong></span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('status', 'Estado') !!}
    <div>
        <label class="mr-2">
            {!! Form::radio('status', 1, false) !!} Publicado
        </label>
        <label>
            {!! Form::radio('status', 0, true) !!} Borrador
        </label>
    </div>
    @error('status')
        <span class="text-danger" role="alert">
            <strong>* {{ $message }}</strong></span>
    @enderror
</div>
