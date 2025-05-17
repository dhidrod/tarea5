<!DOCTYPE html>
<html lang="es">
@include('partials.head')

<body class="flex flex-col min-h-screen">
    @include('partials.header')

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('partials.footer')

</body>

</html>
