<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white">Usuarios</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto">
            @if (session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif

            <table class="min-w-full bg-dark-blue-900 text-white text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nick</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Reputación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $u)
                        <tr>
                            <td>{{ $u->id }}</td>
                            <td>{{ $u->nick }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->surname }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->role }}</td>
                            <td>{{ $u->reputation ?? 0 }}</td>
                            <td class="flex space-x-2 justify-center">
                                <a href="{{ route('admin.users.edit', $u) }}" class="text-blue-600">Editar</a>
                                <form action="{{ route('admin.users.destroy', $u) }}" method="POST"
                                    onsubmit="return confirm('¿Eliminar usuario?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                <div class="flex justify-center">
                    {{ $users->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
