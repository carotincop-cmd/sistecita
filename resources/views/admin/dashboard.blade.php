@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')

<h2 class="text-3xl font-bold mb-8 text-pink-600">
    Panel de Control
</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

    {{-- CARD TEMPLATE --}}
    @php
        $cards = [
            [
                'title' => 'Roles registrados',
                'count' => $rolesCount,
                'icon' => 'fa-solid fa-shield-halved',
                'route' => route('roles.index'),
                'list' => $roles,
                'scroll' => false,
            ],
            [
                'title' => 'Usuarios registrados',
                'count' => $usersCount,
                'icon' => 'fa-solid fa-users',
                'route' => route('users.index'),
                'list' => $users,
                'scroll' => true,
            ],
            [
                'title' => 'Empleados registrados',
                'count' => $employeesCount,
                'icon' => 'fa-solid fa-user-tie',
                'route' => route('employees.index'),
            ],
            [
                'title' => 'Clientes registrados',
                'count' => $clientsCount,
                'icon' => 'fa-solid fa-user-check',
                'route' => route('clients.index'),
            ],
            [
                'title' => 'Categorías registradas',
                'count' => $categoriesCount,
                'icon' => 'fa-solid fa-layer-group',
                'route' => route('service-categories.index'),
            ],
            [
                'title' => 'Servicios registrados',
                'count' => $servicesCount,
                'icon' => 'fa-solid fa-scissors',
                'route' => route('services.index'),
            ],
        ];
    @endphp

    {{-- RECORRER CARDS --}}
    @foreach ($cards as $card)
    <a href="{{ $card['route'] }}"
       class="group bg-white border border-pink-100 shadow-md hover:shadow-xl transition-all duration-300 rounded-3xl p-6 block hover:-translate-y-1 hover:border-pink-300">

        {{-- ICON --}}
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-pink-600 font-semibold text-sm tracking-wide">
                    {{ $card['title'] }}
                </h3>

                <p class="text-4xl font-extrabold text-pink-700 mt-3">
                    {{ $card['count'] }}
                </p>
            </div>

            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-pink-100 to-pink-300
                        flex items-center justify-center text-pink-700 text-2xl shadow-inner">
                <i class="{{ $card['icon'] }}"></i>
            </div>
        </div>

        {{-- LISTADO (SI EXISTE) --}}
        @if(isset($card['list']))
            <div class="mt-5">
                <p class="text-xs text-gray-400 uppercase">Listado</p>

                <ul class="mt-2 space-y-1
                           @if($card['scroll']) max-h-32 overflow-y-auto pr-2 @endif">
                    @forelse ($card['list'] as $item)
                        <li class="text-pink-700 text-sm font-semibold">
                            • {{ $item->name }}
                        </li>
                    @empty
                        <li class="text-gray-500 text-sm">Sin registros</li>
                    @endforelse
                </ul>
            </div>
        @endif

    </a>
    @endforeach

</div>
{{-- ESTADÍSTICAS MANUALES DE CITAS --}}
<div class="mt-10">

    <h2 class="text-2xl font-bold text-pink-600 mb-6">Estadísticas de Citas</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- Total del día --}}
        <div class="bg-white border border-pink-100 shadow-md rounded-3xl p-6">
            <h3 class="text-pink-600 font-semibold text-sm">Citas del día</h3>
            <p class="text-4xl font-extrabold text-pink-700 mt-3">5</p>
            <p class="text-gray-500 text-sm mt-1">Pendientes: 2</p>
        </div>

        {{-- Próxima cita --}}
        <div class="bg-white border border-pink-100 shadow-md rounded-3xl p-6">
            <h3 class="text-pink-600 font-semibold text-sm">Próxima cita</h3>

            <p class="text-xl font-bold text-pink-700 mt-2">11:30 AM</p>
            <p class="text-gray-700 font-medium text-sm">María Fernandez</p>

            <p class="mt-2 text-gray-500 text-xs">
                Servicio: Corte + Peinado
            </p>
        </div>

        {{-- Citas del mes --}}
        <div class="bg-white border border-pink-100 shadow-md rounded-3xl p-6">
            <h3 class="text-pink-600 font-semibold text-sm">Citas del mes</h3>

            <p class="text-4xl font-extrabold text-pink-700 mt-3">48</p>
            <p class="text-gray-500 text-sm mt-1">Última semana: 13</p>
        </div>

    </div>

    {{-- GRÁFICO --}}
    <div class="bg-white border border-pink-100 shadow-md rounded-3xl p-8 mt-8">
        <h3 class="text-lg font-semibold text-pink-600 mb-4">
            Citas por mes (Datos Manuales)
        </h3>

        <canvas id="citasChart" height="100"></canvas>
    </div>

</div>

{{-- SCRIPT MANUAL DE GRÁFICO --}}
<script>
    const ctx = document.getElementById('citasChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
            datasets: [{
                label: 'Citas',
                data: [12, 18, 15, 20, 24, 22], // DATOS MANUALES
                borderWidth: 2,
                borderColor: '#be185d',
                backgroundColor: '#f9a8d4'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection