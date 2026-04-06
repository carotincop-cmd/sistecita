<aside class="hidden lg:flex flex-col border-r border-slate-200 bg-white/80 backdrop-blur-xl 
               dark:border-pink-700/40 dark:bg-[rgba(128,0,64,0.8)]">
    <!-- Header Sidebar -->
    <div class="flex items-center gap-3 px-6 py-6 border-b border-slate-200 dark:border-pink-700/40">
        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-pink-600 to-pink-800 text-white font-bold shadow-lg shadow-pink-500/20">
            TN
        </div>
        <div>
            <h1 class="text-base font-semibold text-slate-900 dark:text-pink-100">Test Nails</h1>
            <p class="text-sm text-slate-500 dark:text-pink-200">Panel administrativo</p>
        </div>
    </div>

    <!-- Navegación -->
    <nav class="flex-1 px-4 py-6 space-y-2">
        @if(auth()->user()->hasModuleAccess('dashboard'))
        <a href="{{ route('dashboard') }}"
           class="group flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium transition
           {{ request()->routeIs('dashboard') 
               ? 'bg-pink-700 text-pink-100 dark:bg-pink-800 dark:text-pink-50'
               : 'text-slate-700 hover:bg-slate-100 dark:text-pink-200 dark:hover:bg-[rgba(128,0,64,0.5)]' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 13h8V3H3v10zM13 21h8v-6h-8v6zM13 3v6h8V3h-8zM3 21h8v-6H3v6z"/>
            </svg>
            Dashboard
        </a>
        @endif

        @if(auth()->user()->hasModuleAccess('roles'))
        <a href="{{ route('roles.index') }}"
           class="group flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium transition
           {{ request()->routeIs('roles.*') 
               ? 'bg-pink-700 text-pink-100 dark:bg-pink-800 dark:text-pink-50'
               : 'text-slate-700 hover:bg-slate-100 dark:text-pink-200 dark:hover:bg-[rgba(128,0,64,0.5)]' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zM12 14l6.16-3.422A12.083 12.083 0 0112 21a12.083 12.083 0 01-6.16-10.422L12 14z"/>
            </svg>
            Gestión de Roles
        </a>
        @endif

        @if(auth()->user()->hasModuleAccess('users'))
        <a href="{{ route('users.index') }}"
           class="group flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium transition
           {{ request()->routeIs('users.*') 
               ? 'bg-pink-700 text-pink-100 dark:bg-pink-800 dark:text-pink-50'
               : 'text-slate-700 hover:bg-slate-100 dark:text-pink-200 dark:hover:bg-[rgba(128,0,64,0.5)]' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 7a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
            Gestión de Usuarios
        </a>
        @endif

        @if(auth()->user()->hasModuleAccess('employees'))
        <a href="{{ route('employees.index') }}"
           class="group flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium transition
           {{ request()->routeIs('employees.*') 
               ? 'bg-pink-700 text-pink-100 dark:bg-pink-800 dark:text-pink-50'
               : 'text-slate-700 hover:bg-slate-100 dark:text-pink-200 dark:hover:bg-[rgba(128,0,64,0.5)]' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.879 6.196M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            Empleados
        </a>
        @endif

        @if(auth()->user()->hasModuleAccess('clients'))
        <a href="{{ route('clients.index') }}"
           class="group flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium transition
           {{ request()->routeIs('clients.*') 
               ? 'bg-pink-700 text-pink-100 dark:bg-pink-800 dark:text-pink-50'
               : 'text-slate-700 hover:bg-slate-100 dark:text-pink-200 dark:hover:bg-[rgba(128,0,64,0.5)]' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20h10M12 4a4 4 0 014 4v4a4 4 0 11-8 0V8a4 4 0 014-4z"/>
            </svg>
            Clientes
        </a>
        @endif

        @if(auth()->user()->hasModuleAccess('services'))
        <a href="{{ route('service-categories.index') }}"
           class="group flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium transition
           {{ request()->routeIs('service-categories.*') 
               ? 'bg-pink-700 text-pink-100 dark:bg-pink-800 dark:text-pink-50'
               : 'text-slate-700 hover:bg-slate-100 dark:text-pink-200 dark:hover:bg-[rgba(128,0,64,0.5)]' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            Categorías de Servicios
        </a>

        <a href="{{ route('services.index') }}"
           class="group flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium transition
           {{ request()->routeIs('services.*') 
               ? 'bg-pink-700 text-pink-100 dark:bg-pink-800 dark:text-pink-50'
               : 'text-slate-700 hover:bg-slate-100 dark:text-pink-200 dark:hover:bg-[rgba(128,0,64,0.5)]' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3"/>
            </svg>
            Servicios
        </a>
        @endif
    </nav>

    <!-- Logout -->
    <div class="border-t border-slate-200 p-4 dark:border-pink-700/40">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full rounded-2xl bg-pink-600 px-4 py-3 text-sm font-medium text-white transition hover:bg-pink-700 dark:bg-pink-800 dark:hover:bg-pink-900">
                Cerrar sesión
            </button>
        </form>
    </div>
</aside>