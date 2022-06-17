<x-app-layout>
    <div class="container">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 my-4 py-4">
            @foreach ($posts as $item)
                <article
                    class="w-full h-80 bg-cover bg-center rounded-md @if ($loop->first) col-span-1 sm:col-span-2 @endif"
                    style="background-image: url({{ Storage::url($item->image->url) }})">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div>
                            @foreach ($item->tags as $tag)
                                <a class="tag tag-{{ $tag->color->name }} mb-1.5" href="{{ route('posts.tag', $tag) }}">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <h1 class="text-4xl text-white leading-8 font-bold">
                            <a href="{{ route('posts.show', $item) }}">{{ $item->title }} </a>
                        </h1>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="mt-4 mb-2">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
