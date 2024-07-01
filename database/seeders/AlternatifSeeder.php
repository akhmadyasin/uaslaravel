<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alternatif')->insert([
            [
                'name' => 'Teknik Informatika',
            ],
            [
                'name' => 'Teknik Electro',
            ],
            [
                'name' => 'Teknik Mesin',
            ],
            [
                'name' => 'Farmasi',
            ],
            [
                'name' => 'Perhotelan',
            ]
        ]);
    }
}
