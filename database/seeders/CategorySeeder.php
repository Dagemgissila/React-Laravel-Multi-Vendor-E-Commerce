<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {

        // Top-level categories (no parent)
        $categories = [
            ['name' => 'Electronics', 'department_id' => 1, 'parent_id' => null],
            ['name' => 'Fashion', 'department_id' => 2, 'parent_id' => null],
        ];

        // Insert and capture their IDs
        foreach ($categories as $cat) {
            DB::table('categories')->insertGetId([
                'name' => $cat['name'],
                'department_id' => $cat['department_id'],
                'parent_id' => $cat['parent_id'],
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Sub-categories with parent_id
        DB::table('categories')->insert([
            [
                'name' => 'Computer',
                'department_id' => 1,
                'parent_id' => 1,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Smart Phone',
                'department_id' => 1,
                'parent_id' => 1,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //sub-categories computer
            [
                'name' => 'Laptop',
                'department_id' => 1,
                'parent_id' => 3,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Desktop',
                'department_id' => 1,
                'parent_id' => 3,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            //sub categories of smart phone

            [
                'name' => 'Andriod',
                'department_id' => 1,
                'parent_id' => 4,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Iphones',
                'department_id' => 1,
                'parent_id' => 4,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
