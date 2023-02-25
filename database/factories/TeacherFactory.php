<?php

namespace Database\Factories;


use Carbon\Carbon;
use App\Models\ClassRoom;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    // public function id()
    // {
    //     $id = ClassRoom::pluck('id');
    //     $data = array($id);
    //     foreach ($data as $key){
    //         return $data[$key];
    //     }
    // }

    public function definition()
    {

        $faker = faker::create();
        return [
            'name' => $faker->name(),
            'nip' => $faker->randomNumber(8, true),
            'address' => $faker->address(),
            'gender' => $faker->randomElement(['Male', 'Female']),
            'no_telp' => $faker->phoneNumber(),
            'email' => $faker->email(),
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
}
