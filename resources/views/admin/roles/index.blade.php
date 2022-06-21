@extends('adminlte::page')

@section('title', 'Tamashii Blog')

@section('content_header')
    <h1>Listado de roles</h1>
@stop

@section('content')
    <div class="card">
        @can('admin.roles.create')
            <div class="card-header">
                <div class="float-right">
                    <a href="{{ route('admin.roles.create') }}" class="btn btn-success">
                        Crear nuevo rol
                    </a>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        @endcan
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        @can(['admin.roles.edit', 'admin.roles.destroy'])
                            <th colspan="2"></th>
                        @endcan

                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->description }}</td>
                            @can('admin.roles.edit')
                                <td width="10px">
                                    <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-sm btn-warning">Editar</a>
                                </td>
                            @endcan
                            @can('admin.roles.destroy')
                                <td width="10px">
                                    {!! Form::open(['route' => ['admin.roles.destroy', $role], 'method' => 'DELETE']) !!}
                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">

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
