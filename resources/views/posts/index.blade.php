@extends('layouts.master')

@section('content')

    <div class="">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Dodaj novi post</a>
    </div>

    <hr>

    @foreach ($posts as $post)
    <div class="blog-post">
        <a href="{{ route('posts.show', $post->slug) }}">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
        </a>
        <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} <a href="#">Mark</a></p>
        <section class="blog-body">
            {!! $post->body !!}
        </section>
    </div>
    @endforeach

    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
    </nav>

@endsection