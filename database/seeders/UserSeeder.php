<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Crea un usuario de prueba cada que ejecuto migrations
        User::factory()->create([
            'name' => 'Erick Guerra',
            'email' => 'erickguerra@software.com',
            'password' => bcrypt('12345678'),
            'id_number' => '12345678',
            'phone' => '5555555555',
            'address' => 'Calle 123, Colonia 456',
        ])->assignRole('Doctor');
    }
}
