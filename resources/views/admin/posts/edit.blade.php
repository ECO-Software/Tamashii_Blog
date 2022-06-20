@extends('adminlte::page')

@section('title', 'Tamashii Blog')

@section('content_header')
    <h1>Modificar Post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="card-body">
            {!! Form::model($post, ['route' => ['admin.posts.update', $post], 'method' => 'PUT', 'autocomplete' => 'off', 'files' => true]) !!}
            @include('admin.posts.partials.form')
            <div>
                {!! Form::submit('Actualizar', ['class' => 'mt-2 btn btn-sm btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#extract'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });
        document.getElementById("image").addEventListener('change', changePicture);

        function changePicture(event) {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }
    </script>
@stop
