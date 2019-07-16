@extends('layouts.master')

@section('content')

    <div class="blog-post">
        <h2 class="blog-post-title">{{ $post->title }}</h2>
        
        <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} <a href="#">Mark</a></p>
        <section class="blog-body">
            {!! $post->body !!}
        </section>
    </div>

    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
        <div class="float-right">
            <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-info">Uredi</a>
            <button class="btn btn-danger">Obriši</button>
        </div>
        <a class="btn btn-primary" href="{{ route('posts.index') }}">Natrag</a>
    </form>

@endsection
