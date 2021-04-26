<?php

namespace App\Enums\Subscription;

use Illuminate\Support\Str;
use \Spatie\Enum\Enum;

/**
 * @method static self company()
 * @method static self companyProduct()
 * @method static self companyNews()
 */
class TypeEnum extends Enum
{
	protected static function values(): \Closure
    {
        return fn(string $name) :string => Str::snake($name);
    }
}
