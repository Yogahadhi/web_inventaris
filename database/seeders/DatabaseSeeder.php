<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name'          => 'Test Admin',
            'jabatan'       => 'Magang',
            'jenis_akun'    => 'Admin',
            'password'      => Hash::make('654321'),
        ]);

        User::create([
            'name'          => 'Yoga',
            'jabatan'       => 'Magang',
            'jenis_akun'    => 'Operator',
            'password'      => Hash::make('123456'),
        ]);

        User::create([
            'name'          => 'Fajar',
            'jabatan'       => 'Magang',
            'jenis_akun'    => 'Operator',
            'password'      => Hash::make('123123'),
        ]);
    }
}
 