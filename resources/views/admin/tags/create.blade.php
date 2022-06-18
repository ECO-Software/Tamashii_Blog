@extends('adminlte::page')

@section('title', 'Tamashii Blog')

@section('content_header')
    <h1>Crear etiqueta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{ Form::open(['route' => 'admin.tags.store']) }}
            @include('admin.tags.partials.form')
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
