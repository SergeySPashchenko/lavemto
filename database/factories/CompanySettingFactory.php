<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\CompanySetting;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanySettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanySetting::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'logo' => $this->faker->text(255),
            'favicon' => $this->faker->text(255),
            'main_image' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
            'state' => $this->faker->state(),
            'city' => $this->faker->city(),
            'address' => $this->faker->address(),
            'zip' => $this->faker->text(255),
            'additional_info' => [],
            'company_id' => \App\Models\Company::factory(),
        ];
    }
}
