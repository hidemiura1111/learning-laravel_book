<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Config/Index</title>
</head>
<body>
    <h1>Config/Index</h1>
    <p>{{ $msg }}</p>
    <ul>
        @foreach ($data as $item)
            <li>{!!$item!!}</li>
        @endforeach
    </ul>
</body>
</html>
