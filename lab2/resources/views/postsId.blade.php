<html>
    <body>
    @foreach($tags as $tag)
        <p>{{$tag->name}}</p>
    @endforeach
    <h1>{{$article->id}}</h1>
    <h1>{{$article->title}}</h1>
    <h4>{{$article->author}}</h4>
    <h6>{{$article->alpha_numeric_code}}</h6>
    <p>{{$article->content}}}</p>
    </body>
</html>
