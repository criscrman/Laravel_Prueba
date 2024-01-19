<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>@yield('title') </title>
     <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Styles -->
        @livewireStyles
</head>
<body>
    <!-- header -->
    <!-- nav -->
    

    @yield('content')

    @livewireScripts
    <!-- footer -->
    
</body>
</html>