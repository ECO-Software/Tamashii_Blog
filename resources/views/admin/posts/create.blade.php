@extends('adminlte::page')

@section('title', 'Tamashii Blog')

@section('content_header')
    <h1>Crear post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => true]) !!}
            @include('admin.posts.partials.form') {{-- Add form of post --}}
            <div>
                {!! Form::submit('Guardar', ['class' => 'mt-2 btn btn-sm btn-primary']) !!}
                {!! Form::reset('Cancelar', ['class' => 'mt-2 btn btn-sm btn-danger']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    {{-- Add Styles for container than charge image. --}}
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
    {{-- CDN ADD CKEDITOR5 --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <script>
        // Script add styles of CKEDITOR 5
        // Add styles of CKEDITOR 5 in extract
        ClassicEditor
            .create(document.querySelector('#extract'))
            .catch(error => {
                console.error(error);
            });
        // Add styles of CKEDITOR 5 in body
        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });
        // Code JS for interactive charge image in page
        // Add event listener for change image
        document.getElementById("image").addEventListener('change', changePicture); 
        // Function change picture
        function changePicture(event) { // event is a event of change image
            var file = event.target.files[0]; // file is a file of image
            var reader = new FileReader(); // reader is a reader of image
            reader.onload = (event) => { // event is a event of reader
                document.getElementById("picture").setAttribute('src', event.target.result); // set attribute of image
            };
            reader.readAsDataURL(file); // read image
        }
    </script>
@stop
