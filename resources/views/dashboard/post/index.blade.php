@extends('dashboard.layout')

@section('content')
    <table>
        <thead>
            <tr>Title</tr>
            <tr>Posted</tr>
            <tr>Category</tr>
        </thead>

        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->posted }}</td>
                    <td>{{ $post->category->title }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}
@endsection
