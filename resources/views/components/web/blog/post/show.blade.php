<div {{ $attributes->class(['my-5', 'bg-blue-100' => true])->merge(['other-attr' => 'valorDefault']) }}>
{{-- <div {{ $attributes->merge(['class' => 'my-5', 'other-attr' => 'data1']) }}> --}}
    {{-- {{ $changeTitle() }} --}}
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->created_at }}</p>
    <p>{{ $post->content }}</p>
</div>
