<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>My CRUD</title>
</head>
<body class="bg-gray-100">
    <nav class="p-6 bg-white flex justify-between">
        <h1>CRUD</h1>
    </nav>
    @yield('content')

    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
</script>
<script src="{{asset('js/image_loader.js')}}"></script>
</body>
</html>