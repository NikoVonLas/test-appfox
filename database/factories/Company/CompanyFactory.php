<?php

namespace Database\Factories\Company;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Company\Company;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() :array
    {
		$name = $this->faker->company();
		return [
			'slug' 				=> Str::slug($name),
			'name' 				=> $name
		];
    }
}
