@extends('adminlte::page')

@section('title', 'Tamashii Blog')

@section('content_header')
    <h1>Editar rol</h1>
@stop

@section('content')
    <div class="card">
        @if (session('success'))
            <div class="card-header">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        @endif
        <div class="card-body">
            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'PUT', 'autocomplete' => 'off']) !!}
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
    <script>
        console.log('Hi!');
    </script>
@stop
