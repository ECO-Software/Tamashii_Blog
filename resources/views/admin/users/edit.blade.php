@extends('adminlte::page')

@section('title', 'Tamashii Blog')

@section('content_header')
    <h1>Asignar roles o permisos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div><label for="name">Usuario: {{ $user->name }}</label></div>
            <div><label for="email">Correo: {{ $user->email }}</label></div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                
            @endif
        </div>
        {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
        <div class="card-body">
            <div class="form-group">
                {!! Form::label('role','Listado de roles',['class' => 'h5']) !!}
                <ul class="list-unstyled">
                    @foreach ($roles as $role)
                        <li>
                            <label>
                                {{ Form::checkbox('roles[]', $role->id, $user->roles->contains($role->id)) }}
                                {{ $role->description }}
                            </label>
                        </li>
                    @endforeach
                </ul>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-12">
                    {!! Form::submit('Modificar rol', ['class' => 'btn btn-sm btn-success']) !!}
                    <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-primary">Volver al listado</a>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
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
