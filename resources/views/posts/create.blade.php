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

                <div class="form-group">
                    <a href="{{ route('posts.index') }}" class="btn btn-primary">Natrag</a>
                    <button type="submit" class="btn btn-success float-right">Objavi</button>
                </div>
                
                @include('layouts.errors')

            </form>
        </div>

      <!-- Modal -->
      <div class="modal fade" id="addTag" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Dodaj novu oznaku</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tags.store') }}" method="post" id="addTagForm">
                    @csrf
                    
                    <div class="form-group">
                        <label for="name">Naziv</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
              <button type="button" class="btn btn-primary" onclick="$('#addTagForm').submit()">Dodaj</button>
            </div>
          </div>
        </div>
      </div>

    </div>

@endsection