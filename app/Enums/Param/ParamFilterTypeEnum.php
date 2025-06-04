<?php

namespace App\Enums\Param;

enum ParamFilterTypeEnum: int
{
    case INTEGER = 1;
    case SELECT = 2;

    public static function names(): array
    {
        return array_map('strtolower', array_column(self::cases(), 'name'));
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function combine(): array
    {
        return array_combine(self::names(), self::values());
    }

    public static function map(): array
    {
        return array_flip(self::combine());
    }

}
