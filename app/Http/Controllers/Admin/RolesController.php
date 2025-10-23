<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
{
    $roles = [
        ['id' => 1, 'name' => 'Paciente', 'created_at' => '20/10/2025'],
        ['id' => 2, 'name' => 'Doctor', 'created_at' => '20/10/2025'],
        ['id' => 3, 'name' => 'Recepcionista', 'created_at' => '20/10/2025'],
        ['id' => 4, 'name' => 'Administrador', 'created_at' => '20/10/2025'],
    ];
    
    return view('admin.roles.index', compact('roles'));
}

    public function create() { }
    public function store(Request $request) { }
    public function show(string $id) { }
    public function edit(string $id) { }
    public function update(Request $request, string $id) { }
    public function destroy(string $id) { }
}