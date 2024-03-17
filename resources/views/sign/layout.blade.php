<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap core CSS -->
    <link href="all/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>@yield('title')</title>
    @notifyCss
    <link rel="stylesheet" href="{{asset('sign/style.css')}}">
</head>
<body>
    
    @yield('sign')

    <script src="{{asset('sign/script.js')}}"></script>
    <x-notify::notify />
    @notifyJs
</body>
</html>