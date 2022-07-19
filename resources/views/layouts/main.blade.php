<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('fa/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('bs/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="container">
        <h1 class="my-5">
            <i class="fas fa-users"></i> Employes
        </h1>
        @yield('content')
    </div>
    
    <script src="{{ asset('js/jquery.slim.main.js') }}"></script>
    <script src="{{ asset('bs/js/bootstrap.min.js') }}"></script>
</body>
</html>