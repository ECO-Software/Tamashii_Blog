<div>
    {{-- Be like water. --}}
    <div class="card">
        <div class="card-header">
            <div>
                <input type="text" wire:model="search" class="form-control" placeholder="Buscar...">
            </div>
            <div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
        @if ($posts->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Título</th>
                        @can(['admin.posts.edit', 'admin.posts.destroy'])
                            <th colspan="3"></th>
                        @else
                            <th></th>
                        @endcan
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td width="10px">
                                    <a href="{{ route('admin.posts.show', $post) }}"
                                        class="btn btn-sm btn-primary">Ver</a>
                                </td>
                                @can('admin.posts.edit')
                                    <td width="10px">
                                        <a href="{{ route('admin.posts.edit', $post) }}"
                                            class="btn btn-sm btn-warning">Editar</a>
                                    </td>
                                @endcan
                                @can('admin.posts.destroy')
                                    <td width="10px">
                                        {!! Form::open(['route' => ['admin.posts.destroy', $post], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                        {!! Form::close() !!}
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $posts->links() }}
            </div>
        @else
            <div class="card-body">
                <p>No hay posts para mostrar</p>
            </div>
        @endif
    </div>
</div>
