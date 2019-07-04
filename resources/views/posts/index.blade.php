<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>Svi Postovi</h1>
        @foreach ($posts as $post)
            <!-- <a href="posts/{{ $post->id }}" > -->
            <a href="{{ route('posts.show', $post->id) }}" >
                <h2> {{ $post->title}}</h2>
            </a>
            <p> {{ $post->body }} </p>
        @endforeach
</body>
</html>