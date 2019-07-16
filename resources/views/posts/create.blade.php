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
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label for="body">Objava</label>
                    <textarea name="body" id="body" class="form-control" cols="80" rows="10">{{ old('body') }}</textarea>
                </div>

                <div class="form-group">
                    <a href="{{ route('posts.index') }}" class="btn btn-primary">Natrag</a>
                    <button type="submit" class="btn btn-success float-right">Objavi</button>
                </div>

            </form>
        </div>

    </div>

@endsection