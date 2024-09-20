@extends('dashboard.layout')

@section('content')
    <div>
        <a href="{{ route('post.create') }}">Create</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Posted</th>
                <th>Category</th>
                <th>Options</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($posts as $post)
                <tr class="border">
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->posted }}</td>
                    <td>{{ $post->category->title }}</td>
                    <td>
                        <a href="{{ route('post.edit', $post->id) }}">Edit</a>
                        <a href="{{ route('post.show', $post->id) }}">Show</a>
                        <form action="{{ route('post.destroy', $post) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    

    {{ $posts->links() }}
@endsection
