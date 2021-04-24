<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Company\Company;
use App\Models\Company\CompanyEmployee;
use App\Models\Company\CompanyNews;
use App\Models\Company\CompanyProduct;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() :void
    {
		User::factory(50)->create();
		Company::factory(10)
			->hasEmployees(rand(1, 10))
			->hasNews(rand(3, 10))
			->hasProducts(rand(5, 20))
			->create();
    }
}
