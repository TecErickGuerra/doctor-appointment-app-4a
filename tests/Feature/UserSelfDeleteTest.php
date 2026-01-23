<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserSelfDeleteTest extends TestCase
{
    use RefreshDatabase;

    public function test_un_usuario_no_puede_eliminarse_a_si_mismo()
    {
        // 1) Crear un usuario de prueba
        $user = User::factory()->create();
        
        // 2) Simular que ese usuario ya inició sesión
        $this->actingAs($user, 'web');
        
        // 3) Simular una petición HTTP DELETE (borrar un usuario)
        $response = $this->delete(route('admin.usuarios.destroy', $user));
        
        // 4) Esperar que el servidor bloquee el borrado a sí mismo
        $response->assertStatus(403);
        
        // 5) Verificar en la BD que sigue existiendo el usuario
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
        ]);
    }
}