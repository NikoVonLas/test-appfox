<?php

namespace Database\Factories\Subscription;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Company\Company;
use App\Models\Subscription\Subscription;
use App\Enums\Subscription\TypeEnum;

class SubscriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subscription::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() :array
    {
		$name = $this->faker->productName();
		$types = TypeEnum::toValues();
        return [
			'user_id'		=> fn() => User::inRandomOrder()->first()?->id ?? User::factory()->create()->id,
			'company_id'	=> fn() => Company::inRandomOrder()->first()?->id ?? Company::factory()->create()->id,
			'type'			=> $types[array_rand($types)]
        ];
    }
}
