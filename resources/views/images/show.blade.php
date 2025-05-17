{{-- resources/views/images/show.blade.php --}}
@extends('layouts.app2')

@section('content')
  <div class="container mx-auto p-6">
    {{-- Breadcrumb / Back link --}}
    <a href="{{ route('home') }}" class="text-blue-500 hover:underline mb-4 inline-block">&larr; Volver al mosaico</a>

    {{-- Imagen en grande --}}
    <div class="mb-6">
      <img src="{{ asset('storage/' . $image->image_path) }}"
           alt="Imagen {{ $image->id }}"
           class="w-full max-h-[400px] object-contain rounded">
    </div>

    {{-- Likes ponderados --}}
    <div class="flex items-center mb-6 ">
      <form method="POST" action="{{ route('images.like', $image) }}">
        @csrf
        <button type="submit"
                class="px-4 py-2 bg-blue-600 text-black rounded hover:bg-blue-500 transition">
          👍 Me gusta ({{ $image->likes_reputation }})
        </button>
      </form>
    </div>

    {{-- Descripción y autor --}}
    <div class="mb-8 p-4 bg-gray-100 rounded">
      <p class="text-lg mb-2">{{ $image->description }}</p>
      <div class="flex items-center space-x-2">
        <img src="{{ asset('storage/' . $image->user->image) }}"
             alt="{{ $image->user->nick }}"
             class="h-8 w-8 rounded-full object-cover">
        <span class="font-medium">{{ $image->user->nick }}</span>
        <span class="text-gray-500 text-sm">· {{ $image->created_at->diffForHumans() }}</span>
      </div>
    </div>

    {{-- Formulario para añadir comentario --}}
    <div class="mb-8">
      <h2 class="text-xl font-semibold mb-4">Añadir comentario</h2>
      <form method="POST" action="{{ route('comments.store', $image) }}">
        @csrf
        <textarea name="content"
                  rows="3"
                  class="w-full border rounded p-2 mb-2 @error('content') border-red-500 @enderror"
                  placeholder="Escribe tu comentario...">{{ old('content') }}</textarea>
        @error('content')
          <p class="text-red-600 text-sm mb-2">{{ $message }}</p>
        @enderror
        <button type="submit"
                class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-500 transition">
          Comentar
        </button>
      </form>
    </div>

    {{-- Lista de comentarios --}}
    <div>
      <h2 class="text-xl font-semibold mb-4">Comentarios ({{ $image->comments->count() }})</h2>
      @forelse($image->comments as $comment)
        <div class="mb-4 p-4 bg-white rounded shadow">
          <div class="flex items-center space-x-3 mb-2">
            <img src="{{ asset('storage/' . $comment->user->image) }}"
                 alt="{{ $comment->user->nick }}"
                 class="h-6 w-6 rounded-full object-cover">
            <span class="font-medium">{{ $comment->user->nick }}</span>
            <span class="text-gray-500 text-xs">{{ $comment->created_at->diffForHumans() }}</span>
          </div>
          <p class="text-gray-800">{{ $comment->content }}</p>
        </div>
      @empty
        <p class="text-gray-600">No hay comentarios aún. ¡Sé el primero en comentar!</p>
      @endforelse
    </div>
  </div>
@endsection
