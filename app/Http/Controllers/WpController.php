<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class WpController extends Controller
{
    public function data()
    {
        // Kosongkan tabel hasil sebelum menghitung ulang
        $this->truncateTable('hasil');

        // Ambil data nilai dari tabel nilai
        $nilaiRecords = DB::table('nilai')->get();
        
        foreach ($nilaiRecords as $record) {
            $alt_id = $record->alt_id;
            $c1 = $record->c1;
            $c2 = $record->c2;
            $c3 = $record->c3;
            $c4 = $record->c4;
            $c5 = $record->c5;

            // Hitung normalisasi
            $nc1 = $this->norm('c1');
            $nc2 = $this->norm('c2');
            $nc3 = $this->norm('c3');
            $nc4 = $this->norm('c4');
            $nc5 = $this->norm('c5');

            // Hitung preferensi value
            $pv1 = $this->label('c1') == 'cost' ? pow($c1, -$nc1) : pow($c1, $nc1);
            $pv2 = $this->label('c2') == 'cost' ? pow($c2, -$nc2) : pow($c2, $nc2);
            $pv3 = $this->label('c3') == 'cost' ? pow($c3, -$nc3) : pow($c3, $nc3);
            $pv4 = $this->label('c4') == 'cost' ? pow($c4, -$nc4) : pow($c4, $nc4);
            $pv5 = $this->label('c5') == 'cost' ? pow($c5, -$nc5) : pow($c5, $nc5);

            // Hitung hasil WP
            $hasil = $pv1 * $pv2 * $pv3 * $pv4 * $pv5;

            // Simpan hasil ke dalam tabel hasil
            $this->savePref($alt_id, $hasil);
        }

        // Tampilkan hasil ke view wp.data
        return $this->viewResult();
    }

    private function truncateTable($tableName)
    {
        DB::table($tableName)->truncate();
    }

    private function norm($kriteria)
    {
        $totalWeight = DB::table('kriteria')->sum('bobot');
        $weight = DB::table('kriteria')->where('flag', $kriteria)->value('bobot');

        return $weight / $totalWeight;
    }

    private function label($kolom)
    {
        return DB::table('kriteria')->where('flag', $kolom)->value('label');
    }

    private function savePref($alt_id, $hasil)
    {
        DB::table('hasil')->insert([
            'alt_id' => $alt_id,
            'hasil' => $hasil
        ]);
    }

    private function viewResult()
    {
        $sum = DB::table('hasil')->sum('hasil');
        $results = DB::table('hasil')
                    ->join('alternatif', 'hasil.alt_id', '=', 'alternatif.id')
                    ->select('hasil.alt_id', 'alternatif.name', 'hasil.hasil')
                    ->orderBy('hasil.hasil', 'DESC')
                    ->get();

        return view('wp.data', ['results' => $results, 'sum' => $sum]);
    }
}
