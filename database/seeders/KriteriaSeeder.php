<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('kriteria')->insert([
            [
                'name' => 'peminat',
                'label' => 'cost',
                'bobot' => '3',
            ],
            [
                'name' => 'peluang karir',
                'label' => 'benefit',
                'bobot' => '5',
            ],
            [
                'name' => 'akreditasi',
                'label' => 'benefit',
                'bobot' => '4',
            ],
            [
                'name' => 'biaya',
                'label' => 'cost',
                'bobot' => '3',
            ],
            [
                'name' => 'nilai',
                'label' => 'cost',
                'bobot' => '2',
            ]
        ]);
    }
}