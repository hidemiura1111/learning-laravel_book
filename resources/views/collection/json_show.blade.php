<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accessor/Index</title>
    <link href="/css/app.css" rel="stylesheet">
    <script>
        function doAction() {
            var id = document.querySelector('#id').value;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/collection/json/' + id, true);
            xhr.responseType = 'json';
            xhr.onload = function(e) {
                if(this.status == 200) {
                    var result = this.response;
                    document.querySelector('#name').textContent = result.name;
                    document.querySelector('#mail').textContent = result.mail;
                    document.querySelector('#age').textContent = result.age;
                }
            };
            xhr.send();
        }
    </script>
</head>
<body>
    <h1>Show json data</h1>
    <div>
        <input type="number" id="id" value="1">
        <button onclick="doAction();">Click</button>
        <ul>
            <li id="name"></li>
            <li id="mail"></li>
            <li id="age"></li>
        </ul>
    </div>
</body>
</html>
