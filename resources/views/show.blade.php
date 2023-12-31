<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post </title>
</head>

<body>
    <article>
        <h1>{{ $post->title }}</h1>

        <p>
            By
            <a href="/author/{{ $post->user->username }}">{{ $post->user->name }}</a>
            in
            <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        </p>

        <div>
            {!! $post->body !!}
        </div>
    </article>


    <a href="/">Go home</a>

</body>

</html>
