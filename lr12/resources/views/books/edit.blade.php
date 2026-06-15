@extends('layouts.app')

@section('title', __('books.edit'))

@section('content')
  <h1 class="h4 mb-3">{{ __('books.edit') }} #{{ $book['book_id'] }}</h1>

  <form action="{{ url('/client/books/' . $book['book_id']) }}"
        method="post"
        class="vstack gap-3">

    @csrf
    @method('PUT')

    <div>
      <label class="form-label">{{ __('books.year_field') }}</label>
      <input name="year"
             type="number"
             class="form-control"
             value="{{ old('year', $book['year']) }}">
    </div>

    <div>
      <label class="form-label">{{ __('books.genre_field') }}</label>
      <input name="genre"
             class="form-control"
             value="{{ old('genre', $book['genre']) }}">
    </div>

    <div>
      <label class="form-label">{{ __('books.status_field') }}</label>
      <select name="is_active" class="form-control">
          <option value="1" {{ $book['is_active'] ? 'selected' : '' }}>
              {{ __('books.status_available') }}
          </option>
          <option value="0" {{ !$book['is_active'] ? 'selected' : '' }}>
              {{ __('books.status_unavailable') }}
          </option>
      </select>
    </div>

    <div>
      <label class="form-label">{{ __('books.condition_field') }}</label>
      <textarea name="condition_note"
                class="form-control"
                rows="3">{{ old('condition_note', $book['condition_note']) }}</textarea>
    </div>

    <button class="btn btn-primary w-100">{{ __('books.save') }}</button>
  </form>
@endsection
