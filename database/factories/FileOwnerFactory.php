<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FileOwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->e164PhoneNumber(),
            'street_address_one' => $this->faker->streetAddress(),
            'street_address_two' => $this->faker->streetAddress(),
            'state' => $this->faker->province(),
            'country' => $this->faker->country()
        ];
    }
}
