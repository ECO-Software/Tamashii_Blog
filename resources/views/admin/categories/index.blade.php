@extends('adminlte::page')

@section('title', 'Tamashii Blog')

@section('content_header')
    <h1>Lista de categorías</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        @can('admin.categories.create')
            <div class="card-header">
                <div class="card-tools">
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i>
                        Añadir
                    </a>
                </div>
            </div>
        @endcan
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        @can(['admin.categories.edit', 'admin.categories.destroy'])
                            <th colspan="2"></th>
                        @endcan

                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            @can('admin.categories.edit')
                                <td width="10px">
                                    <a href="{{ route('admin.categories.edit', $category) }}"
                                        class="btn btn-primary">Editar</a>
                                </td>
                            @endcan
                            @can('admin.categories.destroy')
                                <td width="10px">
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Eliminar</button>
                                    </form>
                                </td>
                            @endcan
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
