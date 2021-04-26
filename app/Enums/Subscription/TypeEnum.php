<?php

namespace App\Enums\Subscription;

use Illuminate\Support\Str;
use BenSampo\Enum\Enum;

/**
 * @method static self company()
 * @method static self companyProduct()
 * @method static self companyNews()
 */
final class TypeEnum extends Enum
{
	const All = 0;
   	const CompanyProduct = 1;
   	const CompanyNews = 2;
}
