@props(['item'])
<div>
    <article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
        <img class="w-full h-72 object-cover object-center"
            src="@if ($item->image) {{ Storage::url($item->image->url) }}@else{{ Storage::url('posts/notfound.png') }} @endif"
            alt="{{ $item->title }}">
        <div class="px-6 py-4">
            <h1 class="font-bold text-xl mb-2">
                <a href="{{ route('posts.show', $item) }}">{{ $item->title }}</a>
            </h1>
            <div class="text-gray-700 text-base">
                {!! $item->extract !!} {{-- Show text without tags HTML --}}
            </div>
        </div>
        <div class="px-6 pt-4 pb-2">
            @foreach ($item->tags as $tag)
                <a class="inline-block tag tag-{{ $tag->color->name }} rounded-full px-3 py-1 text-sm mr-2"
                    href="{{ route('posts.tag', $tag) }}">{{ $tag->name }}</a>
            @endforeach
        </div>
    </article>
</div>
