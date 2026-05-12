<header class="relative z-10 border-b border-slate-200 bg-white backdrop-blur-xl 
               dark:border-pink-700/40 dark:bg-[rgba(128,0,64,0.7)]">
    <div class="flex items-center justify-between px-6 py-4 lg:px-8">
        <!-- Título dinámico -->
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-pink-100">
                @hasSection('page-title')
                    @yield('page-title')
                @else
                    @php
                        $route = request()->route()->getName();
                        $moduleTitle = match(true) {
                            str_starts_with($route, 'dashboard') => 'Dashboard',
                            str_starts_with($route, 'service-categories.') => 'Gestión de Categorías de Servicios',
                            str_starts_with($route, 'services.') => 'Gestión de Servicios',
                            str_starts_with($route, 'gallery.') => 'Gestión de Galería',
                            str_starts_with($route, 'clients.') => 'Gestión de Clientes',
                            str_starts_with($route, 'employees.') => 'Gestión de Empleados',
                            str_starts_with($route, 'roles.') => 'Gestión de Roles',
                            str_starts_with($route, 'users.') => 'Gestión de Usuarios',
                            str_starts_with($route, 'cites.') => 'Gestión de Citas',
                            str_starts_with($route, 'carousel.') => 'Gestión de slides',
                            str_starts_with($route, 'BusinessSetting.') => 'Gestión de Direcciones',

                            default => 'Panel Admin'
                        };
                    @endphp
                    {{ $moduleTitle }}
                @endif
            </h2>
        </div>

        <!-- Info usuario + toggle -->
        <div class="flex items-center gap-4">
            <div class="hidden sm:block text-right">
                <p class="text-sm font-medium text-slate-800 dark:text-pink-100">
                  Bienvenido:  {{ auth()->user()->role?->name ?? 'Administrador' }}
                </p>
            </div>

            <!-- Toggle Dark/Light -->
            <button id="theme-toggle" type="button" 
                    class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-slate-200 
                           bg-white text-slate-700 shadow-sm transition hover:bg-slate-100 
                           dark:border-pink-700/40 dark:bg-[rgba(128,0,64,0.8)] dark:text-pink-100 dark:hover:bg-[rgba(128,0,64,0.9)]"
                    aria-label="Cambiar tema">
                <span id="theme-icon" class="text-lg">🌙</span>
            </button>
        </div>
    </div>
</header>