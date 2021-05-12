<!DOCTYPE html>
<html lang="{{ config ('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ config('app.name')  }}</title>
</head>
<body>
    

    <div class="content">
        @yield('content') <!-- Vai refletir em todas as paginas -->
    </div>

</body>
</html>