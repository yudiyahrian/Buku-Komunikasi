<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\ClassRoom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        ClassRoom::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name' => 'X PPLG 1'],
            ['name' => 'X PPLG 2'],
            ['name' => 'X PPLG 3'],
            ['name' => 'X PPLG 4'],
            ['name' => 'XI PPLG 1'],
            ['name' => 'XI PPLG 2'],
            ['name' => 'XI PPLG 3'],
            ['name' => 'XI PPLG 4'],
            ['name' => 'X MM 1'],
            ['name' => 'X MM 2'],
            ['name' => 'X MM 3'],
            ['name' => 'X MM 4'],
            ['name' => 'XI MM 1'],
            ['name' => 'XI MM 2'],
            ['name' => 'XI MM 3'],
            ['name' => 'XI MM 4'],
        ];

        foreach ($data as $item) {
                ClassRoom::insert([
                    'name' => $item['name'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
        }
    }
}
