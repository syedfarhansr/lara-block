<x-layout>

<article>

    <h1>

        {{ $post->title }}
    </a>
    </h1>
    <div>
        {!! $post->body !!}
    </div>
</article>
<a href="/">Go back </a>
</x-layout>
