<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome </title>
</head>

<body>
    @foreach ($posts as $post)
       <article>
            <h1><a href="/posts/{{$post->slug}}">{{$post->title}}</a></h1>

            <p>
                By
                <a href="/author/{{ $post->user->username }}">{{ $post->user->name }}</a>
                in
                <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
            </p>

           <div>{{$post->excerpt}}</div>
        </article>
    @endforeach

</body>

</html>
