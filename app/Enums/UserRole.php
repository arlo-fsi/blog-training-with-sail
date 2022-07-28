<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;

/**
 * @method static UserRole ADMIN()
 * @method static UserRole USER()
 */
final class UserRole extends Enum
{
    private const ADMIN = 1;
    private const USER = 0;
}
