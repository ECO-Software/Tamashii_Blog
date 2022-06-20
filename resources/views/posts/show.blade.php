<x-app-layout>
    <div class="container py-8">
        <h1 class="text-4xl font-bold text-center text-gray-700">
            {{ $post->title }}
        </h1>

        <div class="text-justify font-thin text-sm my-2">
            {!! $post->extract !!}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Contenido principal --}}
            <div class="lg:col-span-2">
                <figure class="py-2">
                    <img src="@if ($post->image) {{ Storage::url($post->image->url) }} @else {{ Storage::url('posts/notfound.png') }} @endif"
                        alt="{{ $post->title }}" class="w-full h-80 object-cover object-center">
                </figure>
                <div class="text-base text-gray-500 text-justify ">
                    {!! $post->body !!}
                </div>
            </div>
            {{-- Contenido relacionado --}}
            <aside>
                @if ($post->category != null)
                    <h1 class="text-2xl font-bold text-gray-600 my-4">Más de {{ $post->category->name }}</h1>
                    <ul>
                        @foreach ($related as $relate_post)
                            <li class="mb-4">
                                <a class="flex" href="{{ route('posts.show', $relate_post) }}">
                                    <img class="w-36 h-20 object-cover object-center"
                                        src="@isset($relate_post->image) {{ Storage::url($relate_post->image->url) }} @else  {{ Storage::url('posts/notfound.png') }} @endisset"  alt=""> 
                                    <span class="ml-2
                                        my-auto text-gray-600">{{ $relate_post->title }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif

            </aside>
        </div>
    </div>
</x-app-layout>
