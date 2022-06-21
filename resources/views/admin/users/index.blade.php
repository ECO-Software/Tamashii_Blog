@extends('adminlte::page')

@section('title', 'Tamashii Blog')

@section('content_header')
    <h1>Listado de usuarios</h1>
@stop

@section('content')
    @livewire('admin.user-search-table')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop