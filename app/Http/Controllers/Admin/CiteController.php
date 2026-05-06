<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cite;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Service;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CiteController extends Controller
{
    // 🧠 REGLAS DE NEGOCIO (PRO REAL FIX)
    private function validateBusinessRules($request)
    {
    $today = now()->toDateString();

    $selectedDate = $request->date;

    // 🔥 NORMALIZAR HORA (ELIMINA SEGUNDOS SI EXISTEN)
    $selectedTime = substr($request->start_time, 0, 5);

    // 📅 VALIDAR FECHA PASADA
    if ($selectedDate < $today) {
        return 'No puedes seleccionar una fecha pasada';
    }

    // ⏰ SOLO VALIDAR SI ES HOY
    if ($selectedDate === $today) {

        try {
            $selectedDateTime = Carbon::createFromFormat(
                'Y-m-d H:i',
                $selectedDate . ' ' . $selectedTime
            );

            // 🔥 IMPORTANTE: usar now EXACTO sin startOfMinute
            $now = Carbon::now();

            if ($selectedDateTime->lessThan($now)) {
                return 'No puedes seleccionar una hora anterior a la actual';
            }

        } catch (\Exception $e) {
            return 'Formato de hora inválido';
        }
    }

    return null;
}

    public function index(Request $request)
    {
        $query = Cite::with(['client', 'employee', 'service']);

        // 🔍 SEARCH GLOBAL
        if ($request->search) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->whereHas('client', function ($q2) use ($search) {
                    $q2->where('first_name', 'like', "%{$search}%")
                       ->orWhere('last_name', 'like', "%{$search}%");
                })
                ->orWhereHas('employee', function ($q2) use ($search) {
                    $q2->where('first_name', 'like', "%{$search}%")
                       ->orWhere('last_name', 'like', "%{$search}%");
                });
            });
        }

        // 🎯 FILTER SERVICE
        if ($request->service_id) {
            $query->where('service_id', $request->service_id);
        }

        // 📌 FILTER STATUS
        if ($request->status) {
            $query->where('status', $request->status);
        }

        $cites = $query->latest()->paginate(10)->withQueryString();

        $clients = Client::all();
        $employees = Employee::where('status', 1)->get();
        $services = Service::where('status', 1)->get();

        return view('admin.cites.index', compact('cites', 'clients', 'employees', 'services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'employee_id' => 'required|exists:employees,id',
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date',
            'start_time' => 'required'
        ]);

        // 🧠 VALIDAR REGLAS
        if ($rule = $this->validateBusinessRules($request)) {
            return back()->with('error', $rule);
        }

        $service = Service::findOrFail($request->service_id);

        $start = Carbon::parse($request->start_time);
        $end = (clone $start)->addMinutes($service->duration);
        $request->merge([
            'start_time' => substr($request->start_time, 0, 5)
        ]);
        // 🚨 CONFLICTO HORARIOS
        $exists = Cite::where('employee_id', $request->employee_id)
            ->where('date', $request->date)
            ->where(function ($query) use ($start, $end) {
                $query->whereBetween('start_time', [$start, $end])
                      ->orWhereBetween('end_time', [$start, $end])
                      ->orWhere(function ($q) use ($start, $end) {
                          $q->where('start_time', '<=', $start)
                            ->where('end_time', '>=', $end);
                      });
            })
            ->exists();

        if ($exists) {
            return back()->with('error', 'El horario seleccionado ya está ocupado');
        }

        Cite::create([
            'client_id' => $request->client_id,
            'employee_id' => $request->employee_id,
            'service_id' => $request->service_id,
            'date' => $request->date,
            'start_time' => $start->format('H:i:s'),
            'end_time' => $end->format('H:i:s'),
            'status' => 'pending',
            'notes' => $request->notes
        ]);

        return back()->with('success', 'La cita ha sido creada correctamente');
    }

    public function update(Request $request, $id)
    {
        $cite = Cite::findOrFail($id);

        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'employee_id' => 'required|exists:employees,id',
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date',
            'start_time' => 'required'
        ]);

        // 🧠 VALIDAR REGLAS
        if ($rule = $this->validateBusinessRules($request)) {
            return back()->with('error', $rule);
        }

        $service = Service::findOrFail($request->service_id);

        $start = Carbon::parse($request->start_time);
        $end = (clone $start)->addMinutes($service->duration);

        // 🚨 CONFLICTO (EXCLUYENDO ACTUAL)
        $exists = Cite::where('employee_id', $request->employee_id)
            ->where('date', $request->date)
            ->where('id', '!=', $cite->id)
            ->where(function ($query) use ($start, $end) {
                $query->whereBetween('start_time', [$start, $end])
                      ->orWhereBetween('end_time', [$start, $end])
                      ->orWhere(function ($q) use ($start, $end) {
                          $q->where('start_time', '<=', $start)
                            ->where('end_time', '>=', $end);
                      });
            })
            ->exists();

        if ($exists) {
            return back()->with('error', 'El horario seleccionado ya está ocupado');
        }

        $cite->update([
            'client_id' => $request->client_id,
            'employee_id' => $request->employee_id,
            'service_id' => $request->service_id,
            'date' => $request->date,
            'start_time' => $start->format('H:i:s'),
            'end_time' => $end->format('H:i:s'),
            'status' => $request->status,
            'notes' => $request->notes
        ]);

        return back()->with('success', 'La cita ha sido actualizada correctamente');
    }

    public function destroy($id)
    {
        $cite = Cite::findOrFail($id);
        $cite->delete();

        return back()->with('success', 'La cita ha sido eliminada correctamente');
    }
}