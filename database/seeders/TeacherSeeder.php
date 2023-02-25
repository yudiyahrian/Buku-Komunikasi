<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = [
            ['class_id'=> 1],
            ['class_id'=> 2], 
            ['class_id'=> 3],
            ['class_id'=> 4],
            ['class_id'=> 5],
            ['class_id'=> 6],
            ['class_id'=> 7],
            ['class_id'=> 8],
            ['class_id'=> 9],
            ['class_id'=> 10],
            ['class_id'=> 11],
            ['class_id'=> 12],
            ['class_id'=> 13],
            ['class_id'=> 14],
            ['class_id'=> 15],
            ['class_id'=> 16],
        ];
        foreach($id as $int) { 
            Teacher::factory()->count(1)->create([
                'class_id' => $int['class_id'],
            ]);
        }
    }
}
