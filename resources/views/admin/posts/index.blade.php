@extends('adminlte::page')

@section('title', 'Tamashii Blog')

@section('content_header')
    <h1>Listado de posts</h1>
@stop

@section('content')
    @livewire('admin.search-post')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop