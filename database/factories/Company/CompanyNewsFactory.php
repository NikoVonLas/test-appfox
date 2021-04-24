<?php

namespace Database\Factories\Company;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Company\Company;
use App\Models\Company\CompanyNews;

class CompanyNewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyNews::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() :array
    {
		$title = $this->faker->sentence();
        return [
			'company_id' 	=> fn() => Company::inRandomOrder()->first()?->id ?? Company::factory()->create()->id,
            'title' 		=> $title,
			'slug'			=> Str::slug($title),
			'content' 		=> $this->faker->paragraph
        ];
    }
}
