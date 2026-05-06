<div class="overflow-x-auto rounded-2xl shadow-xl border border-pink-200 bg-white">
    <table class="w-full text-sm text-left">

        <thead class="bg-gradient-to-r from-pink-500 to-pink-600 text-white text-xs">
            <tr>
                <th class="px-6 py-3">ID</th>
                <th class="px-6 py-3">Negocio</th>
                <th class="px-6 py-3">Dirección</th>
                <th class="px-6 py-3">WhatsApp</th>
                <th class="px-6 py-3">Horario</th>
                <th class="px-6 py-3 text-right">Acciones</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-pink-100">

            @if($setting)

            <tr class="hover:bg-pink-50 transition">

                <td class="px-6 py-4 font-semibold text-pink-700">
                    #{{ $setting->id }}
                </td>

                <td class="px-6 py-4 font-medium text-gray-700">
                    {{ $setting->business_name ?: '---' }}
                </td>

                <td class="px-6 py-4 text-gray-600">
                    {{ $setting->address ?: '---' }}
                </td>

                <td class="px-6 py-4 text-pink-700 font-semibold">
                    {{ $setting->whatsapp ?: '---' }}
                </td>

                <td class="px-6 py-4 text-gray-500">
                    {{ $setting->opening_hours ?: '---' }}
                </td>

                <td class="px-6 py-4">
                    <div class="flex justify-end gap-2">
                        <button 
                            @click='$store.bsModal.editSetting(@json($setting))'
                            class="bg-pink-500 hover:bg-pink-600 text-white px-3 py-1 rounded-full text-xs">
                            Editar
                        </button>
                    </div>
                </td>

            </tr>

            @else

            <tr>
                <td colspan="6" class="text-center py-6 text-pink-400">
                    No hay dirección registrada
                </td>
            </tr>

            @endif

        </tbody>
    </table>
</div>