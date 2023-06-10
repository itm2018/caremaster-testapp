<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //Retrieve list of company ids
        $comIds = DB::table('companies')->pluck('id')->toArray();
        //Pick a random key in this list
        $randomKey = array_rand($comIds);
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->email(),
            'phone' => fake()->unique()->phoneNumber(),
            'company_id' => $comIds[$randomKey] //Pick a random company id in existed list
        ];
    }
}
