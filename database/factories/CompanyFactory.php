<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $logosPath = 'storage/app/public/logos';
        if(!is_dir($logosPath)) {
            mkdir($logosPath);
        }
        return [
            'name' => fake()->unique()->name(),
            'email'=> fake()->unique()->companyEmail(),
            'logo' => fake()->image($logosPath,100,100, null, false),
            'website' => fake()->url()
        ];
    }
}
