<?php

namespace Database\Factories;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
            $faker = faker::create();
            return [
                'name' => $faker->name(),
                'nis' => $faker->randomNumber(8, true),
                'address' => $faker->address(),
                'gender' => $faker->randomElement(['Male', 'Female']),
                'no_telp' => $faker->phoneNumber(),
                'email' => $faker->email(),
                'password' => Hash::make('password'),
                'point' => '100',
                'class_id' => $faker->numberBetween(1, 16),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
    }
}
