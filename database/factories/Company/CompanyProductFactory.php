<?php

namespace Database\Factories\Company;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Company\Company;
use App\Models\Company\CompanyProduct;

class CompanyProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() :array
    {
		$name = $this->faker->productName();
        return [
			'company_id' 	=> fn() => Company::inRandomOrder()->first()?->id ?? Company::factory()->create()->id,
			'name'			=> $name,
			'slug'			=> Str::slug($name),
            'price' 		=> $this->faker->randomFloat(2, 0, 10000)
        ];
    }
}
