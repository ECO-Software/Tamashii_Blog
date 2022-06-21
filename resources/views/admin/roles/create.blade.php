@extends('adminlte::page')

@section('title', 'Tamashii Blog')

@section('content_header')
    <h1>Crear un nuevo rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store', 'autocomplete' => 'off']) !!}
                @include('admin.roles.partials.form')
                <div>
                    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
                    <a class="btn btn-secondary" href="{{ route('admin.roles.index') }}">Volver al listado</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop