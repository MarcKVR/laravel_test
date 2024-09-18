@extends('dashboard.layout')

@section('content')
    <h1>Actualizar Post</h1>

    @include('dashboard.fragment._errors-form')

    <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @method('PATCH')

        @include('dashboard.post._form', ['task'=>'edit'])

        <button type="submit">Update</button>
    </form>
@endsection
