@extends('layouts.app2')

@section('content')
  <div class="container mx-auto p-6 max-w-md">
    <h1 class="text-2xl font-bold mb-4">Subir nueva imagen</h1>

    @if(session('success'))
      <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('images.store') }}" enctype="multipart/form-data">
      @csrf

      <div class="mb-4">
        <label for="image_file" class="block mb-1">Selecciona imagen (Máximo 2MB)</label>
        <input type="file" name="image_file" id="image_file" 
               class="w-full border rounded @error('image_file') border-red-500 @enderror" required>
        @error('image_file')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="description" class="block mb-1">Descripción (opcional)</label>
        <textarea name="description" id="description" rows="3"
                  class="w-full border rounded"></textarea>
        @error('description')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <button type="submit"
              class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-500">
        Subir
      </button>
    </form>
  </div>
@endsection
