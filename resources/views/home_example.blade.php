<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- This Is how to get YEAR Dynamic -->
    <p>A Great number is {{2 + 2}}</p>
    <p>The current year is {{ date('Y') }}</p>

    <h3>{{$name}}</h3>
    <h2>{{$catname}}</h2>

    <ul>
        @foreach($animalsName as $hewan)
        <li>{{$hewan}}</li>
        @endforeach
    </ul>
</body>
</html>