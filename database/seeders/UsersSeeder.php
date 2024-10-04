<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(1)->create([
            'name' => 'Иван',
            'last_name' => 'Иванов',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);
        User::factory(1)->create([
            'name' => 'Иван2',
            'last_name' => 'Иванов2',
            'email' => 'test@admin.com',
            'password' => Hash::make('admin'),
        ]);
        User::factory(10)->create();
    }
}
