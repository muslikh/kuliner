<?php

namespace Database\Seeders;

use App\Models\SubDistrict;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubDistricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            'Kecamatan Bangil',
            'Kecamatan Beji',
            'Kecamatan Gempol',
            'Kecamatan Gondang Wetan',
            'Kecamatan Grati',
            'Kecamatan Kejayan',
            'Kecamatan Kraton',
            'Kecamatan Lekok',
            'Kecamatan Lumbang',
            'Kecamatan Nguling',
            'Kecamatan Pandaan',
            'Kecamatan Pasrepan',
            'Kecamatan Pohjentrek',
            'Kecamatan Prigen',
            'Kecamatan Purwodadi',
            'Kecamatan Purwosari',
            'Kecamatan Puspo',
            'Kecamatan Rejoso',
            'Kecamatan Rembang',
            'Kecamatan Sukorejo',
            'Kecamatan Tosari',
            'Kecamatan Tutur',
            'Kecamatan Winongan',
            'Kecamatan Wonorejo',
        ];

        foreach ($datas as $data) {
            SubDistrict::create([
                'name' => $data,
                'slug' => Str::slug($data)
            ]);
        }
    }
}
