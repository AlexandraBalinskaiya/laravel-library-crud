@extends('layouts.app')

@section('content')

<h1>{{ __('books.title') }}</h1>

<table class="table table-bordered">
    @foreach($books as $b)
    <tr>
        <td>{{ $b['title'] }}</td>
        <td>{{ $b['author'] }}</td>
        <td>
            <a href="/client/books/{{ $b['book_id'] }}/edit">
                {{ __('books.edit') }}
            </a>
        </td>
        <td>
            <form action="{{ url('/client/books/' . $b['book_id']) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-link p-0">{{ __('books.delete') }}</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<a href="/client/books/create" class="btn btn-success">
    {{ __('books.add') }}
</a>

@endsection
