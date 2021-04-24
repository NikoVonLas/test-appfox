<?php

namespace Database\Factories\Company;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Company\Company;
use App\Models\Company\CompanyEmployee;


class CompanyEmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyEmployee::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() :array
    {
		$position = $this->faker->jobTitle();

        return [
			'user_id'		=> fn() => User::inRandomOrder()
				->whereNotIn('id', fn ($q) => $q->select('user_id')->from('company_employees'))
				->first()?->id ?? User::factory()->create()->id,
			'company_id' 	=> fn() => Company::inRandomOrder()->first()?->id ?? Company::factory()->create()->id,
            'position' 		=> $position,
			'slug'			=> Str::slug($position),
        ];
    }
}
