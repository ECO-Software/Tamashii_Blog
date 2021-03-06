@extends('adminlte::page')

@section('title', 'Tamashii Blog')

@section('content_header')
    <h1>Editar etiqueta</h1>
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
            {{ Form::model($tag, ['route' => ['admin.tags.update', $tag], 'method' => 'put']) }}
            @include('admin.tags.partials.form')
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
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
