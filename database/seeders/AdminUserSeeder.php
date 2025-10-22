<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuario administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@miempresa.com',
            'password' => Hash::make('7}*"1^Uf8jWV'),
            'email_verified_at' => now(),
        ]);

        $this->command->info('Usuario administrador creado:');
        $this->command->info('Email: admin@miempresa.com');
        $this->command->info('Contraseña: admin123');
    }
}
