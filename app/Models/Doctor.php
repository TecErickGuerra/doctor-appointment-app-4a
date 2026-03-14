<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'especialidad',
        'numero_licencia_medica',
        'biografia',
        'foto_perfil',
    ];

    // Relación uno a uno inversa con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación uno a muchos con Appointments
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}