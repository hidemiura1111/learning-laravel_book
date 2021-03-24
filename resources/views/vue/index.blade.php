<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vue/Index</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body style="padding: 10px;">
    <h1>Vue/Index</h1>
    <p>{!! $msg !!}</p>
    
    <div id="app">
        <example-component></example-component>
        <my-component></my-component>
        <people-component></people-component>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
