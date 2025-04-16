<?php

namespace App\Enums;

enum RoleEnum: string
{
    case Admin = "Admin";
    case Vendor = 'Vendor';
    case User = "User";
}
