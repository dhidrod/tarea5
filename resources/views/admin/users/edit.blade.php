@extends('layouts.app2')

@section('content')
  <div class="py-6">
    <div class="max-w-md mx-auto text-white bg-[#161615] p-6 rounded shadow ">
      <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @csrf @method('PUT')

        <div class="mb-4">
          <label>Rol</label>
          <select name="role" class="block w-full border text-black">
            <option value="user"  @selected($user->role==='user')>User</option>
            <option value="admin" @selected($user->role==='admin')>Admin</option>
          </select>
        </div>

        <div class="mb-4">
          <label>Nick</label>
          <input type="text" name="nick" class="text-black" value="{{ $user->nick }}" 
                 class="block w-full border" required>
        </div>

        <div class="mb-4">
          <label>Nombre</label>
          <input type="text" name="name" class="text-black" value="{{ $user->name }}" 
                 class="block w-full border" required>
        </div>

        <div class="mb-4">
          <label>Apellido</label>
          <input type="text" name="surname" class="text-black" value="{{ $user->surname }}" 
                 class="block w-full border" required>
        </div>

        <div class="mb-4">
          <label>Email</label>
          <input type="email" name="email" class="text-black" value="{{ $user->email }}" 
                 class="block w-full border" required>
        </div>

        <div class="mb-4">
          <label>Reputación</label>
          <input type="number" name="reputation" class="text-black" value="{{ $user->reputation }}" 
                 class="block w-full border" min="0" max="1000">
        </div>

        <div class="flex justify-end">
          <button type="submit" class="px-4 py-2 bg-[#dbdbdb] text-black rounded">
            Guardar
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
