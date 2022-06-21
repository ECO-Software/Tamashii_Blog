<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="search">Buscar</label>
                        <input type="text" class="form-control" id="search" wire:model="search"
                            placeholder="Buscar por nombre o correo">
                    </div>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        @if ($users->count())
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th colspan="2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @php
                                                $i = 0;
                                                $n = $user->roles->count();
                                            @endphp
                                            @foreach ($user->roles as $role)
                                                {{ $role->name }}@if ($i < $n - 1),  @else. @endif
                                                @php $i++ @endphp
                                            @endforeach
                                        </td>
                                        <td width="10px">
                                            <a href="{{ route('admin.users.edit', $user) }}"
                                                class="btn btn-sm btn-primary">
                                                Editar
                                            </a>
                                        </td>
                                        <td width="10px">
                                            {!! Form::open(['route' => ['admin.users.destroy', $user], 'method' => 'DELETE']) !!}
                                            {!! Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="mb-2">
                    Cantidad de usuarios: {{ $users->total() }}
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        @else
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info">
                            No hay usuarios que coincidan con la búsqueda.
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
