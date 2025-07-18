<?php

namespace App\Static;

class Roles
{
    public const ADMIN    = 'admin';
    public const OFFICER  = 'petugas';
    public const CUSTOMER = 'customer';

    public static function all(): array
    {
        return [
            self::ADMIN,
            self::OFFICER,
            self::CUSTOMER,
        ];
    }

    public static function isValid(string $role): bool
    {
        return in_array($role, self::all(), true);
    }

    public static function getRoleId(string $role): int
    {
        return array_search($role, self::all(), true) + 1;
    }

    public static function getRoleName(int $id): string
    {
        return self::all()[$id - 1] ?? 'unknown';
    }
}