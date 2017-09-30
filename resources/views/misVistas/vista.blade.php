<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$article->title}}</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/myCss.css')}}">
</head>
<body>
 El Blog de Oscar
    <br><br>

    <h1>{{$article->title}}</h1>
    <hr>
    {{$article->content}}
    <hr>
    {{$article->user->name}} | {{$article->category->name}} |

    @foreach($article->tags as $tag)
        {{$tag->name}}
    @endforeach
</body>
</html>



