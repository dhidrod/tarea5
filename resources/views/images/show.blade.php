{{-- resources/views/images/show.blade.php --}}
@extends('layouts.app2')

@section('content')
    <div class="container mx-auto p-6 ">
        {{-- Link para volver atrás --}}
        <a href="{{ route('home') }}" class="text-blue-500 hover:underline mb-4 inline-block">&larr; Volver atrás</a>

        <div class="relative mb-6 flex items-center justify-center">
            {{-- Flecha anterior (izquierda) --}}
            @if ($prevId)
                <a href="{{ route('images.show', $prevId) }}"
                    class="transform -translate-y-1/2 p-2 bg-gray-800 bg-opacity-50 rounded-full hover:bg-opacity-75">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
            @endif

            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Imagen {{ $image->id }}"
                class="h-full max-h-[400px] object-contain rounded">

            {{-- Flecha siguiente (derecha) --}}
            @if ($nextId)
                <a href="{{ route('images.show', $nextId) }}"
                    class="transform -translate-y-1/2
              p-2 bg-gray-800 bg-opacity-50 rounded-full hover:bg-opacity-75">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            @endif
        </div>


        {{-- Likes --}}
        <form method="POST" action="{{ route('images.like', $image) }}">
            @csrf
            <button type="submit" class="px-4 py-2 rounded transition"
                style="background-color: {{ Auth::user()->likes()->where('image_id', $image->id)->exists() ? 'rgb(255, 100, 100)' : 'rgb(117, 153, 245)' }} !important">
                {{ Auth::user()->likes()->where('image_id', $image->id)->exists() ? 'Dar un No me gusta' : 'Dar un Me gusta' }}
                ({{ $image->likes_reputation }})
            </button>
        </form>


        {{-- Descripción y autor --}}
        <div class="mb-8 p-4 bg-gray-100 rounded">
            <p class="text-lg mb-2">{{ $image->description }}</p>
            <div class="flex items-center space-x-2">
                <img src="{{ asset('storage/' . $image->user->image) }}" alt="{{ $image->user->nick }}"
                    class="h-8 w-8 rounded-full object-cover">
                <span class="font-medium">{{ $image->user->nick }}</span>
                <span class="text-gray-500 text-sm">· {{ $image->created_at->diffForHumans() }}</span>
            </div>
        </div>

        {{-- Formulario para añadir comentario --}}
        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Añadir comentario</h2>
            @if (session('success'))
                <div class="mb-4 text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('comments.store', $image) }}">
                @csrf
                <textarea name="content" rows="3"
                    class="w-full border rounded p-2 mb-2 @error('content') border-red-500 @enderror"
                    placeholder="Escribe tu comentario...">{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-600 text-sm mb-2">{{ $message }}</p>
                @enderror
                <button type="submit" style="background-color: rgb(127, 222, 127) !important" class="px-4 py-2  rounded">
                    {{-- Icono de comentario --}}
                    Comentar
                </button>
            </form>
        </div>

        {{-- Lista de comentarios --}}
        <div class="">
            <h2 class="text-xl font-semibold mb-4">Comentarios ({{ $image->comments->count() }})</h2>

            @forelse($image->comments as $comment)
                <div class="mb-4 p-4 bg-white rounded shadow relative">
                    <div class="flex items-center space-x-3 mb-2 pr-16"> {{-- Añadido padding derecho para evitar solapamiento --}}
                        <img src="{{ asset('storage/' . $comment->user->image) }}" alt="{{ $comment->user->nick }}"
                            class="h-6 w-6 rounded-full object-cover">
                        <span class="font-medium">{{ $comment->user->nick }}</span>
                        <span class="text-gray-500 text-xs">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="text-gray-800">{{ $comment->content }}</p>
                        {{-- Botón de eliminar alineado a la derecha --}}
                        @if (auth()->id() === $comment->user_id)
                            <form action="{{ route('comments.destroy', $comment) }}" method="POST"
                                onsubmit="return confirm('¿Eliminar tu comentario?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background-color: red !important"
                                    class="text-white px-3 py-1.5 rounded-md shadow-sm hover:shadow-md transition-all duration-200 flex items-center">
                                    Eliminar
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-gray-600">No hay comentarios aún. ¡Sé el primero en comentar!</p>
            @endforelse
        </div>
    </div>
@endsection
