@extends('dashboard.layout')

@section('content')
    <div>
        <a class="btn" href="{{ route('category.create') }}">Create</a>
    </div>

    <div class="relative overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Options</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
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
    </div>
    

    {{ $categories->links() }}
@endsection
