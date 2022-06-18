@extends('adminlte::page')

@section('title', 'Tamashii Blog')

@section('content_header')
    <h1>Lista de etiquetas</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <a href="{{ route('admin.tags.create') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-plus"></i>
                    Nueva etiqueta
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td width="10px">
                                <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-info">
                                    Editar
                                </a>
                            </td>
                            <td width="10px">
                                {{ Form::open(['route' => ['admin.tags.destroy', $tag], 'method' => 'DELETE']) }}
                                <button class="btn btn-danger">
                                    Eliminar
                                </button>
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
