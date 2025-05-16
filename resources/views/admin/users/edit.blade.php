<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl">Editar Usuario #{{ $user->id }}</h2>
  </x-slot>

  <div class="py-6">
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
      <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @csrf @method('PUT')

        <div class="mb-4">
          <label>Rol</label>
          <select name="role" class="block w-full border">
            <option value="user"  @selected($user->role==='user')>User</option>
            <option value="admin" @selected($user->role==='admin')>Admin</option>
          </select>
        </div>

        <div class="mb-4">
          <label>Reputación</label>
          <input type="number" name="reputation" value="{{ $user->reputation }}" 
                 class="block w-full border" min="0" max="1000">
        </div>

        <div class="flex justify-end">
          <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">
            Guardar
          </button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>
