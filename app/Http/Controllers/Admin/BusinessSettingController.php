<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessSetting;
use Illuminate\Http\Request;

class BusinessSettingController extends Controller
{
    /**
     * Mostrar página principal (index con modal create/edit)
     */
    public function index()
{
    $setting = BusinessSetting::first();

    return view('admin.direccion.index', compact('setting'));
}

public function store(Request $request)
{
    $data = $request->validate([
        'business_name' => 'nullable|string|max:255',
        'logo' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'district' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'reference' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:20',
        'whatsapp' => 'nullable|string|max:20',
        'email' => 'nullable|email|max:255',
        'google_maps_url' => 'nullable|string',
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
        'opening_hours' => 'nullable|string|max:255',
        'facebook' => 'nullable|string|max:255',
        'instagram' => 'nullable|string|max:255',
        'tiktok' => 'nullable|string|max:255',
        'about_text' => 'nullable|string',
    ]);

    BusinessSetting::updateOrCreate(['id' => 1], $data);

    return redirect()->route('direccion.index')
        ->with('success', 'Guardado correctamente');
}

public function update(Request $request, $id)
{
    $setting = BusinessSetting::findOrFail($id);

    $data = $request->validate([
        'business_name' => 'nullable|string|max:255',
        'logo' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'district' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'reference' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:20',
        'whatsapp' => 'nullable|string|max:20',
        'email' => 'nullable|email|max:255',
        'google_maps_url' => 'nullable|string',
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
        'opening_hours' => 'nullable|string|max:255',
        'facebook' => 'nullable|string|max:255',
        'instagram' => 'nullable|string|max:255',
        'tiktok' => 'nullable|string|max:255',
        'about_text' => 'nullable|string',
    ]);

    $setting->update($data);

    return redirect()->route('direccion.index')
        ->with('success', 'Actualizado correctamente');
}
}