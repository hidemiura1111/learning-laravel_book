<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PAaination/Index</title>
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <h1>Pagination/Index</h1>
    <p>{!! $msg !!}</p>
    <ol>
        @foreach ($data as $item)
            <li>{{ $item->name }} [{{ $item->mail }}, {{ $item->age }}]</li>
        @endforeach
    </ol>
    {!! $paginator->links() !!}
    <hr>
</body>
</html>
