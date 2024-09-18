@extends('dashboard.layout')

@section('content')
    <h1>Crear category</h1>

    @include('dashboard.fragment._errors-form')

    <form action="{{ route('category.store') }}" method="post" >
        @include('dashboard.category._form')

        <button type="submit">Create</button>
    </form>
@endsection
