@extends('layouts.master')

@section('content')

    <div class="card mb-5">
        <div class="card-body">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Dodaj novi post</a>
        </div>
    </div>

    @foreach ($posts as $post)
    <div class="blog-post">
        <a href="{{ route('posts.show', $post->id) }}">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
        </a>
        <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} <a href="#">Mark</a></p>
        <section>
            {{ $post->body }}
        </section>
    </div>
    @endforeach

    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
    </nav>

@endsection