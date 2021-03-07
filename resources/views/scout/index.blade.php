<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search by Scout/Index</title>
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <h1>Search by Scout/Index</h1>
    <p>{!! $msg !!}</p>

    <div>
        <form action="/scout/" method="post">
            @csrf
            <input type="text" id="find" name="find" value="{{$input}}">
        </form>
    </div>

    <div>
        <hr>
        <table border="1">
            @foreach ($data as $item)
                <tr>
                    <th>{{ $item->id }}</th>
                    <td>{{ $item->all_data }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
