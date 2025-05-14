<header
    class="{{ auth()->check() && auth()->user()->hasRole('admin') ? 'bg-[#b88b38]' : 'bg-[#161615]' }} shadow-md p-4">
    <nav class="container mx-auto px-4 py-2 flex justify-between items-center">
        <a href="/" class="text-4xl font-bold text-[#EDEDEC]">
            Red Social
        </a>

        <ul class="flex gap-6 text-[#EDEDEC]">
                    @role('admin')
                    <p>Bienvenido, Administrador.</p>
                    @endrole

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
