@extends('layouts.app2')

@section('content')
  <div class="container mx-auto p-6 max-w-md">
    <h1 class="text-2xl font-bold mb-4">Editar descripción</h1>

    <form method="POST" action="{{ route('images.update', $image) }}">
      @csrf
      @method('PUT')

      <div class="mb-4">
        <label for="description" class="block mb-1">Descripción</label>
        <textarea name="description" id="description" rows="4"
                  class="w-full border rounded p-2 @error('description') border-red-500 @enderror"
        >{{ old('description', $image->description) }}</textarea>
        @error('description')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex justify-between">
        <a href="{{ route('images.show', $image) }}"
           class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
          Cancelar
        </a>
        <button type="submit"
                class="px-4 py-2 bg-blue-600 text-black rounded hover:bg-blue-500">
          Guardar
        </button>
      </div>
    </form>
  </div>
@endsection
