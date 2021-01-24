<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Config/Index</title>
    <style>
        th {
            background-color: red;
            padding: 10px;
        }
        td {
            background-color: #eee;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1>Config/Index</h1>
    <p>{!! $msg !!}</p>
    {{-- {!! ** !!} is not escape from HTML --}}
    <ul>
        @foreach ($data as $item)
            <li>{!!$item!!}</li>
        @endforeach
    </ul>

    <p><a href="/download/">download</a></p>

    <form action="/upload" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <input type="submit">
    </form>
</body>
</html>
