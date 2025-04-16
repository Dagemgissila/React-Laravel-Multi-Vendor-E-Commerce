<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Enums\PermissionEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userRole = Role::create(["name" => RoleEnum::User->value]);
        $adminRole = Role::create(["name" => RoleEnum::Admin->value]);
        $vendorRole = Role::create(["name" => RoleEnum::Vendor->value]);


        //permission
        $approveVendor = Permission::create(['name' => PermissionEnum::ApproveVendors->value]);
        $sellProducts = Permission::create(['name' => PermissionEnum::SellProducts->value]);
        $buyProducts = Permission::create(['name' => PermissionEnum::BuyProducts->value]);

        $userRole->syncPermissions([$buyProducts]);
        $vendorRole->syncPermissions([$sellProducts, $buyProducts]);
        $adminRole->syncPermissions([$approveVendor, $sellProducts, $buyProducts]);

    }
}
