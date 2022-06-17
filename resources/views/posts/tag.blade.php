<x-app-layout>
    <div class="container">
        <h1 class="mt-4 text-center font-bold text-4xl text-gray-600">Etiqueta: {{ $tag->name }}</h1>
        <div class="grid grid-cols-1 gap-6 my-4 py-4">
            @foreach ($posts as $item)
               <x-card-post :item="$item"/>
            @endforeach
        </div>
        <div class="mt-4 mb-2">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
