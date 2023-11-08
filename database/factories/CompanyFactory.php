<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

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
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => 'secondary',
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'country' => $this->faker->country(),
            'api_keys' => [],
            'slug' => $this->faker->slug(),
            'company_id' => function () {
                return \App\Models\Company::factory()->create([
                    'company_id' => null,
                ])->id;
            },
        ];
    }
}
