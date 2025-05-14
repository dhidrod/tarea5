<!DOCTYPE html>
<html lang="es">
@include('partials.head')

<body>
    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

</body>

</html>
