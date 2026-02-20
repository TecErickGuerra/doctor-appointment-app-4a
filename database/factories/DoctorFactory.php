<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'especialidad' => $this->faker->randomElement([
                'Cardiología',
                'Pediatría',
                'Dermatología',
                'Neurología',
                'Oncología',
                'Medicina General',
            ]),
            'numero_licencia_medica' => $this->faker->numerify('LIC-#####'),
            'biografia' => $this->faker->sentence(12),
            'foto_perfil' => null, // podrías agregar URL de imagen si usas almacenamiento
        ];
    }
}