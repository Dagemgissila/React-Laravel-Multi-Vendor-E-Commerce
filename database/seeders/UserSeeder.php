<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\RoleEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => "User",
            'email' => 'user@gmail.com'
        ])->assignRole(RoleEnum::User->value);
        User::factory()->create([
            'name' => "Vendor",
            'email' => 'vendor@gmail.com'
        ])->assignRole(RoleEnum::Vendor->value);

        User::factory()->create([
            'name' => "Admin",
            'email' => 'admin@gmail.com'
        ])->assignRole(RoleEnum::Admin->value);
    }
}
