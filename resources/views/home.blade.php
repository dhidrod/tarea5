@extends('layouts.app2')

@section('content')
    <div class="container mx-auto p-6">
        {{-- Cabecera --}}
        <h1 class="text-3xl font-bold mb-4 text-center">Inicio</h1>
        <p class="text-lg text-center text-gray-700 mb-6">
            Bienvenido a la galería. Aquí puedes ver y compartir imágenes.
        </p>

        <div class="flex justify-end mb-4">
            <a href="{{ route('images.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-500">
                + Subir imagen
            </a>
        </div>


        {{-- Grid de imágenes --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($images as $img)
                <div class="relative group border rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                    <img src="{{ asset('storage/' . $img->image_path) }}" alt="Imagen {{ $img->id }}"
                        class="w-full h-48 object-cover">

                    <div
                        class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100
                      flex flex-col justify-end p-4 text-white text-sm transition">
                        <div>{{ Str::limit($img->description, 60) }}</div>
                        <div class="mt-2 flex items-center space-x-2">
                            <img src="{{ asset('storage/' . $img->user->image) }}" alt="{{ $img->user->name }}"
                                class="h-6 w-6 rounded-full object-cover border-2 border-white">
                            <span>{{ $img->user->nick }}</span>
                        </div>
                    </div>

                    {{-- Enlace transparente para click --}}
                    <a href="{{ route('images.show', $img) }}" class="absolute inset-0"></a>
                </div>
            @endforeach
        </div>

        {{-- Paginación centrada --}}
        <div class="mt-8 flex justify-center">
            {{ $images->links() }}
        </div>
    </div>
@endsection
