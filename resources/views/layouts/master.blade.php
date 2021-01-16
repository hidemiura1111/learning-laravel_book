<html>
<head>
    <title>@yield('title')</title>
    <style>
        th { background-color: #999; color: fff; padding: 5px 10px; }
        td { border: solid 1px #aaa; color: #999; padding: 5px 10px; }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <h1>@yield('title')</h1>

    @section('menu')
        <h2>Menu</h2>
        <ul>
            <li>@show</li>
        </ul>

        <hr size="1">
        <div>
            @yield('content')
        </div>

        <div>
            @yield('footer')
        </div>
</body>
</html>
