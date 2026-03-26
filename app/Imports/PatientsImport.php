<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Patient;
use App\Models\BloodType;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class PatientsImport implements ToCollection, WithHeadingRow, WithChunkReading
{
    public function collection(Collection $rows)
    {
        // Cache blood types to avoid N+1 queries during the loop
        $bloodTypes = BloodType::all()->keyBy('name');

        foreach ($rows as $row) {
            // Validate essential fields to avoid breaking the import
            if (empty($row['correo']) || empty($row['nombre_completo'])) {
                continue;
            }

            // Create or update User by email to prevent duplicates and handle missing data intelligently
            $user = User::firstOrCreate(
                ['email' => $row['correo']],
                [
                    'name' => $row['nombre_completo'],
                    'phone' => $row['telefono'] ?? '0000000000',
                    'id_number' => uniqid('id_'),
                    'address' => 'No especificada',
                    'password' => Hash::make(uniqid('pw_')),
                ]
            );

            // Resolve the blood type ID optimally
            $bloodTypeId = null;
            if (!empty($row['tipo_sangre']) && isset($bloodTypes[$row['tipo_sangre']])) {
                $bloodTypeId = $bloodTypes[$row['tipo_sangre']]->id;
            }

            // Normalize allergies text
            $allergies = null;
            if (!empty($row['alergias']) && strtolower(trim($row['alergias'])) !== 'ninguna') {
                $allergies = $row['alergias'];
            }

            // Link the Patient profile to the User
            Patient::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'blood_type_id' => $bloodTypeId,
                    'date_of_birth' => $row['fecha_nacimiento'] ?? null,
                    'allergies' => $allergies,
                ]
            );
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
