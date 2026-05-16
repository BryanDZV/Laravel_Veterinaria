<?php

namespace Database\Seeders;

use App\Models\Citas;
use App\Models\Mascotas;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class VeterinariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { // 1. Crear el usuario Administrador
        User::create([
            'login' => 'admin',
            'nombre' => 'Admin',
            'apellidos' => 'Sistema',
            'dni' => '11111111A',
            'password' => Hash::make('password'),
            'tipo' => 'administrador',
        ]);

        // 2. Crear el usuario Veterinario (y lo guardamos en una variable para usar su ID luego)
        $veterinario = User::create([
            'login' => 'vet1',
            'nombre' => 'Laura',
            'apellidos' => 'Gómez',
            'dni' => '22222222B',
            'password' => Hash::make('password'),
            'tipo' => 'veterinario',
        ]);

        // 3. Crear dos Mascotas
        $mascota1 = Mascotas::create([
            'nombre' => 'Firulais',
            'chip' => 'CHIP001',
            'telefono_dueno' => '600111222',
            'tipo' => 'domestica',
        ]);

        Mascotas::create([
            'nombre' => 'Iguana Pepe',
            'chip' => 'CHIP002',
            'telefono_dueno' => '600333444',
            'tipo' => 'exotica',
        ]);

        // 4. Crear una Cita vinculando al veterinario y la primera mascota
        Citas::create([
            'fecha' => Carbon::tomorrow()->format('Y-m-d'),
            'hora' => '10:30:00',
            'veterinario_id' => $veterinario->id,
            'mascota_id' => $mascota1->id,
        ]);
    }
}
