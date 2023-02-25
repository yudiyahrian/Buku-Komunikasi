<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Violation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ViolationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Terlambat Masuk Sekolah',
             'penalty' => 'Diberikan hukuman',
              'point' => '5']
              ,
            ['name' => 'Keluar sekolah tanpa izin',
             'penalty' => 'Diberikan surat pembinaan',
              'point' => '10'
            ],
            ['name' => 'Memakai Celana Ketat/Pensil',
             'penalty' => 'Melepas Jahitan dan membuat surat pernyataan',
              'point' => '15'
            ],
            ['name' => 'Memakai Seragam tidak sesuai jadwal',
             'penalty' => 'Dipulangkan untuk mengganti seragam sesuai jadwal',
              'point' => '15'
            ],
            ['name' => 'Memakai attribut yang tidak ditentukan sekolah',
             'penalty' => 'Disita dan diberikan pembinaan',
              'point' => '10'
            ],
            ['name' => 'Menggunakan HP di kelas tanpa seizin guru',
             'penalty' => 'Disita dan diberikan pembinaan',
              'point' => '10'
            ],
            ['name' => 'Membuat pakaian menggunakan logo sekolah yang di modifikasi',
             'penalty' => 'Diberikan pembinaan',
              'point' => '15'
            ],
            ['name' => 'Memakai kaos kaki tidak sesuai ketentuan sekolah',
             'penalty' => 'Diberikan pengarahan dan disita kaos kakinya',
              'point' => '5'
            ],
            ['name' => 'Memakai kaos kaki tidak sesuai ketentuan sekolah',
             'penalty' => 'Diberikan pengarahan dan disita kaos kakinya',
              'point' => '5'
            ],
        ];
        foreach($data as $item){
            Violation::insert([
                'name' => $item['name'],
                'penalty' => $item['penalty'],
                'point' => $item['point'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}