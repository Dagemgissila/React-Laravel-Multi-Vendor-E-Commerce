<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            'Electronics',
            'Fashion',
            'Home ,Garden ,Tools',
            'Books & Audio',
            'Health & Beauty'
        ];

        foreach ($departments as $name) {
            DB::table('departments')->insert([
                'name' => $name,
                'slug' => Str::slug($name),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
