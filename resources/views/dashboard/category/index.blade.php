@extends('dashboard.layout')

@section('content')
    <div>
        <a href="{{ route('category.create') }}">Create</a>
    </div>

    <table>
        <thead>
            <tr>Id</tr>
            <tr>Title</tr>
            <tr>Options</tr>
        </thead>

        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>
                        <a href="{{ route('category.edit', $category->id) }}">Edit</a>
                        <a href="{{ route('category.show', $category->id) }}">Show</a>
                        <form action="{{ route('category.destroy', $category) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    

    {{ $categories->links() }}
@endsection
