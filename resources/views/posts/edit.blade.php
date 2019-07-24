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
            <form action="{{ route('posts.update', $post->id) }}" method="post">

                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <div class="form-group">
                    <label for="title">Naslov</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                </div>

                <div class="form-group">
                    <label for="body">Objava</label>
                    <textarea name="body" id="body" class="form-control" cols="80" rows="10">{{ $post->body }}</textarea>
                </div>

                <div class="form-group mb-4">
                    <h6>Tags</h6>
                    @foreach ($tags as $tag)
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="tag-{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}"
                            {{ $tag->posts->contains($post->id) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group mb-4">
                    <h6>Kategorija</h6>
                    @foreach ($cats as $cat)
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="cat-{{ $cat->id }}" name="cats" value="{{ $cat->id }}"
                            {{ $cat->posts->contains($post->id) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="cat-{{ $cat->id }}">{{ $cat->name }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <a href="{{ route('posts.index') }}" class="btn btn-primary">Natrag</a>
                    <button type="submit" class="btn btn-success float-right">Uredi</button>
                </div>

                @include('layouts.errors')

            </form>
        </div>

    </div>

@endsection