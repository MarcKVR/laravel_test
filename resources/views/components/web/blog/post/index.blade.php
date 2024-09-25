{{ $slot }}

{{ $header }}

@foreach ($posts as $post)
    <div class="card card-white mb-2">
        <h3>{{ $post->title }}</h3>
        <a href="{{ route('web.blog.show', $post) }}">Ir al blog</a>
        <p>{{ $post->description }}</p>
    </div>
@endforeach

{{ $extra }}

{{ $posts->links() }}

{{ $footer }}