<?php

namespace Database\Seeders;

use App\Models\Admin;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'Trần Công Minh',
            'email' => 'minhtc.dev@larana.vn',
            'password' => Hash::make('password'),
            'image' => '/admin/images/not-found.jpg'
        ]);

        $this->call([
            ModuleSeeder::class
        ]);
    }
}