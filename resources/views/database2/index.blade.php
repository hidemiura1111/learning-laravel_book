<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Database2/Index</title>
</head>
<body>
    <h1>Database2/Index</h1>
    <p>{!! $msg !!}</p>
    <ol>
        @foreach ($data as $item)
            <li>{{ $item->name }} [{{ $item->mail }}, {{ $item->age }}]</li>
        @endforeach
    </ol>
    <hr>
</body>
</html>
