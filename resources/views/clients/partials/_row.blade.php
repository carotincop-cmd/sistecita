<tr class="hover:bg-pink-50 transition duration-300">

<td class="px-6 py-3 font-medium text-pink-800">
    {{ $client->first_name }} {{ $client->last_name }}
</td>

<td class="px-6 py-3 text-pink-600">
    {{ $client->phone ?? '—' }}
</td>

<td class="px-6 py-3 text-pink-600">
    {{ $client->email ?? '—' }}
</td>

<td class="px-6 py-3 text-pink-600">
    {{ $client->notes ? Str::limit($client->notes, 40) : '—' }}
</td>

</tr>