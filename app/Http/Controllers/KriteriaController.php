<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function data()
    {
        $kriteria = DB::table('kriteria')->get();
        return view('kriteria.data', ['kriteria' => $kriteria]);
    }

    public function add()
    {
        return view('kriteria.add');
    }

    public function addProcess(Request $request)
    {
        DB::table('kriteria')->insert([
            'name' => $request->name,
            'label' => $request->label,
            'bobot' => $request->bobot,
            'flag' => $request->flag
        ]);
        return redirect('kriteria')->with('status', 'Berhasil menambahkan!');
    }

    public function edit($id)
    {
        $kriteria = DB::table('kriteria')->where('id', $id)->first();
        return view('kriteria.edit', compact('kriteria'));
    }

    public function editProcess(Request $request, $id)
    {
        DB::table('kriteria')->where('id', $id)
        ->update([
            'name' => $request->name,
            'label' => $request->label,
            'bobot' => $request->bobot
        ]);
        return redirect('kriteria')->with('status', 'Berhasil diupdate!');
    }

    public function delete($id)
    {
        DB::table('kriteria')->where('id', $id)->delete();
        return redirect('kriteria')->with('status', 'Berhasil dihapus!');
    }
}
