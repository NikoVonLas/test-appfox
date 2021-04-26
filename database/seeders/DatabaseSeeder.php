<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Company\Company;
use App\Models\Company\CompanyEmployee;
use App\Models\Company\CompanyNews;
use App\Models\Company\CompanyProduct;
use App\Models\Subscription\Subscription;
use App\Enums\Subscription\TypeEnum;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() :void
    {
		User::flushEventListeners();
		Company::flushEventListeners();
		CompanyEmployee::flushEventListeners();
		CompanyNews::flushEventListeners();
		CompanyProduct::flushEventListeners();

		User::factory(50)->create();
		Company::factory(10)
			->hasEmployees(rand(1, 10))
			->hasNews(rand(3, 10))
			->hasProducts(rand(5, 20))
			->create();

		$types = array_map(fn ($type) => ['type' => $type], TypeEnum::toValues());
		Subscription::factory(80)->state(new Sequence(...$types))->create();
    }
}
