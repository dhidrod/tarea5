<header
    class="{{ auth()->check() && auth()->user()->hasRole('admin') ? 'bg-[#b88b38]' : 'bg-[#161615]' }} shadow-md p-4">
    <nav class="container mx-auto px-4 py-2 flex justify-between items-center">
        <a href="/" class="text-4xl font-bold text-[#EDEDEC]">
            Red Social
        </a>

        <ul class="flex gap-6 text-[#EDEDEC]">

            @role('admin')
                <p>Bienvenido, Administrador.</p>

                <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
                    {{ __('Gestionar usuarios') }}
                </x-nav-link>
            @endrole
            @role('user')
                <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="Avatar de {{ auth()->user()->name }}"
                    class="h-10 w-10 rounded-full object-cover">

                <p>Bienvenido, {{ auth()->user()->name }}.</p>
            @endrole

            @auth
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link">Cerrar sesión</button>
                    </form>
                </li>
            @endauth
            
            <li>
                <a href="/" class="nav-link">Inicio</a>
            </li>
            <li>
                <a href="/dashboard" class="nav-link">Dashboard</a>
            </li>
            <li>
                <a href="/register" class="nav-link">Nuevo Usuario</a>
            </li>
            <li>
                <a href="/admin" class="nav-link">Admin</a>
            </li>
        </ul>
    </nav>
</header>
