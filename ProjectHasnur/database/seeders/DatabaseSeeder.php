<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Mahasiswa;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'username' => 'Admin',
            'password' => bcrypt('12345'),
        ]);
        Mahasiswa::create([
            'nim' => '2110131310002',
            'nama' => 'fuad',
            'program_studi' => 'pendidikan komputer',
            'no_hp' => '082159348849',
        ]);
    }
}
