@extends('layouts.app')
@section('title', __('books.add'))

@section('content')
    <h1 class="h4 mb-3">{{ __('books.add') }}</h1>

    <form action="{{ url('/client/books') }}" method="post" class="vstack gap-3">
        @csrf

        <div>
            <label class="form-label">{{ __('books.title_field') }}</label>
            <input name="title" class="form-control" value="{{ old('title') }}">
        </div>

        <div>
            <label class="form-label">{{ __('books.author_field') }}</label>
            <input name="author" class="form-control" value="{{ old('author') }}">
        </div>

        <div>
            <label class="form-label">{{ __('books.year_field') }}</label>
            <input name="year" type="number" class="form-control" value="{{ old('year') }}">
        </div>

        <div>
            <label class="form-label">{{ __('books.genre_field') }}</label>
            <input name="genre" class="form-control" value="{{ old('genre') }}">
        </div>

        <div>
            <label class="form-label">{{ __('books.isbn_field') }}</label>
            <input name="isbn" class="form-control" value="{{ old('isbn') }}">
        </div>

        <button class="btn btn-primary w-100">{{ __('books.save') }}</button>
    </form>
@endsection
