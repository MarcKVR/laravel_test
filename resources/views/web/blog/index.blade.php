@extends('web.layout')

@section('content')
    <h1>Listado</h1>
    <x-web.blog.post.index :posts="$posts">
        <h1>Listado principal de post SLOT POR DEFECTO</h1>

        @slot('header')
            <h1>Contenido del header --slot con nombre</h1>
        @endslot

        @slot('footer')
            <h1>Pie de página</h1>
        @endslot

        @slot('extra', 'EXTRA')

    </x-web.blog.post.index>
@endsection