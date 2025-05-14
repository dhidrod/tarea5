<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <title>@yield('title', 'Red Social')</title>
</head>
<body class="bg-gray-50 text-gray-800">
  @include('partials.header')
  <div class="container mx-auto px-4 lg:px-0 flex flex-col lg:flex-row mt-6">
    <main class="flex-1 lg:mr-6">

    </main>
    {{-- <aside class="w-full lg:w-1/4">
      @include('partials.sidebar')
    </aside> --}}
  </div>
  @include('partials.footer')
</body>
</html>
