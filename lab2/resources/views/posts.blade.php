<html>
    <body>
    <form action="/posts" method="get">
        @csrf
        <input type="text" name="code" placeholder="code">
        <input type="text" name="title" placeholder="title">
        <input type="text" name="tag" placeholder="tag">
        <button>Filter</button>
    </form>

    <table>
        <tr><td>Article Name</td><td>Article Id</td><td>Article Author</td></tr>
        @foreach($articleArray as $article)
            <tr><td><a href="/posts/{{$article -> id}}">{{$article -> title}}</a></td>
                <td>{{$article -> id}} </td>
                <td>{{$article -> author}} </td></tr>
        @endforeach
    </table>
    </body>
</html>
