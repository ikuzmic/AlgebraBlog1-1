@extends('layouts.master')

@section('content')
<div class="blog-post">
        <a href="{{ route('posts.show', $post->slug) }}">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
        </a>
        <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} <a href="#">Mark</a></p>
        <section class="blog-body">
            {{ $post->body }}
        </section>
    </div>
@endsection
