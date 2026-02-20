<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialty; 

class DoctorController extends Controller
{
    public function index()
    {
        $doctores = Doctor::all();
        return view('admin.doctors.index', compact('doctores'));
    }
    
    public function create()
    {
        $specialties = [
        'Cardiología',
        'Dermatología',
        'Pediatría',
        'Neurología',
        'Ginecología',
        'Traumatología',
        'Oncología',
        'Psiquiatría',
    ];
    return view('admin.doctors.create', compact('specialties'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nombre'                 => 'required|string|max:255',
        'apellido'               => 'required|string|max:255',
        'especialidad'           => 'required|string',
        'numero_licencia_medica' => 'required|string|max:255',
        'biografia'              => 'nullable|string',
    ]);

    Doctor::create([
    'nombre'                 => $request->nombre,
    'apellido'               => $request->apellido,
    'especialidad'           => $request->especialidad,
    'numero_licencia_medica' => $request->numero_licencia_medica,
    'biografia'              => $request->biografia,
    'foto_perfil'            => null,
]);

    return redirect()->route('admin.doctors.index')->with('success', 'Doctor creado correctamente');
}

    public function edit(Doctor $doctor)
    {
        $specialties = [
        'Cardiología',
        'Dermatología',
        'Pediatría',
        'Neurología',
        'Ginecología',
        'Traumatología',
        'Oncología',
        'Psiquiatría',
    ];
    return view('admin.doctors.edit', compact('doctor', 'specialties'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
        'especialidad'          => 'required|string',
        'numero_licencia_medica' => 'required|string|max:255',
        'biografia'             => 'nullable|string',
    ]);

    $doctor->update($request->only('especialidad', 'numero_licencia_medica', 'biografia'));

    return redirect()->route('admin.doctors.index')->with('success', 'Doctor actualizado correctamente.');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('admin.doctors.index')->with('success', 'Doctor eliminado');
    }
    
}
