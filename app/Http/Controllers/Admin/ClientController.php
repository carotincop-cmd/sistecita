<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $clients = Client::query()
            ->when($search, function ($query) use ($search) {
                $query->where('first_name', 'LIKE', "%{$search}%")
                      ->orWhere('last_name', 'LIKE', "%{$search}%")
                      ->orWhere('phone', 'LIKE', "%{$search}%")
                      ->orWhere('email', 'LIKE', "%{$search}%");
            })
            ->orderBy('first_name')
            ->paginate(5)
            ->appends($request->all());

        return view('admin.clients.index', compact('clients', 'search'));
    }

    // 🔥 CREAR CLIENTE
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'nullable|string|max:100',
            'phone'      => 'required|string|max:20',
            'email'      => 'nullable|email|max:150',
            'notes'      => 'nullable|string|max:500',
        ]);

        $client = Client::create($request->only([
            'first_name',
            'last_name',
            'phone',
            'email',
            'notes'
        ]));

        if ($request->expectsJson()) {
            return response()->json($client);
        }

        return redirect()
            ->route('clients.index')
            ->with('success', 'Cliente creado correctamente');
    }

    // ✏️ ACTUALIZAR CLIENTE
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'nullable|string|max:100',
            'phone'      => 'required|string|max:20',
            'email'      => 'nullable|email|max:150',
            'notes'      => 'nullable|string|max:500',
        ]);

        $client->update($request->only([
            'first_name',
            'last_name',
            'phone',
            'email',
            'notes'
        ]));

        return redirect()
            ->route('clients.index')
            ->with('success', 'Cliente actualizado correctamente');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()
            ->route('clients.index')
            ->with('success', 'Cliente eliminado correctamente');
    }
}