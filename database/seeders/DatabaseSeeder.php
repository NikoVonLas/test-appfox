<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Builder;

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

		User::factory(100)->create();
		Company::factory(10)
			->hasEmployees(rand(1, 5))
			->hasNews(rand(3, 10))
			->hasProducts(rand(5, 20))
			->create();

		$employee 	= User::has('employee')->inRandomOrder()->first();
		$user 		= User::doesntHave('employee')->inRandomOrder()->first();
		$companies 	= Company::has('employees')->inRandomOrder()
						->limit(count(TypeEnum::getValues()))->get();
		$sequences = [];
		foreach (TypeEnum::getValues() as $n => $type) {
			$sequences[] = [
				'user_id'		=> $employee->id,
				'company_id'	=> $companies[$n]->id,
				'type' 			=> $type
			];
			$sequences[] = [
				'user_id'		=> $user->id,
				'company_id'	=> $companies[$n]->id,
				'type' 			=> $type
			];
		}

		Subscription::factory(6)
			->state(new Sequence(...$sequences))
			->create();
    }
}
