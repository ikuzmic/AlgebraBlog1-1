@extends('layouts.master')

@section('content')

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>

    <div>
        <div>
            <h3>Kreiraj novu objavu</h3>
        </div>

        <hr>

        <div>
            <form action="{{ route('posts.store') }}" method="post">

                @csrf
                
                <div class="form-group">
                    <label for="title">Naslov</label>
                    <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" name="title" value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label for="body">Objava</label>
                    <textarea name="body" id="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" cols="80" rows="10">{{ old('body') }}</textarea>
                </div>

                <div class="form-group mb-4">
                    <h6>Oznake</h6>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#addTag">
                        Dodaj Oznaku
                    </button>

                    @foreach ($tags as $tag)
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="tag-{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}">
                            <label class="custom-control-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group mb-4">
                    <h6>Kategorije</h6>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#addCat">
                        Dodaj Kategoriju
                    </button>
                    @foreach ($cats as $cat)
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="cat-{{ $cat->id }}" name="cats" value="{{ $cat->id }}">
                            <label class="custom-control-label" for="cat-{{ $cat->id }}">{{ $cat->name }}</label>
                        </div>
                    @endforeach
                
                </div>
                
                <div class="form-group">
                    <a href="{{ route('posts.index') }}" class="btn btn-primary">Natrag</a>
                    <button type="submit" class="btn btn-success float-right">Objavi</button>
                </div>
                
                @include('layouts.errors')

            </form>
        </div>

        @include('tags.modal')
        @include('cats.modal')

    </div>

@endsection