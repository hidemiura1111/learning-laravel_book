<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accessor/Index</title>
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <h1>Accessor/Index</h1>
    <p>{!! $msg !!}</p>
    <table border="1">
            @foreach ($data as $item)
            <tr>
                <th>{{ $item->id }}</th>
                <td>{{ $item->name_and_age }}</td>
            </tr>
            @endforeach
    </table>
</body>
</html>
