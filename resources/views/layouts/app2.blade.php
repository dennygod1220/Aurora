<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>震旦活動網</title>
    <script src="./js/app.js"></script>
    <link rel="stylesheet" href="./css/app.css">
    <style>
        * {
            margin: 0px;
        }

        .container-fluid {
            padding: 0px;
        }

        html {
            font-size: 1rem;
        }
    </style>

<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container-fluid">
        <a href="{{ url('/') }}" class="btn btn-outline-info">首頁</a>
        <a href="{{ url('/ActivityMethod') }}" class="btn btn-outline-info">活動辦法</a>
        @yield('content')
    </div>
</body>

</html>