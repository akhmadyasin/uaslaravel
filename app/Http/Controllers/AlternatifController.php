<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function data()
    {
        $alternatif = DB::table('alternatif')->get();
        //return $alternatif;
        return view('alternatif.data', ['alternatif' => $alternatif]);
    }

    public function add()
    {
        return view('alternatif.add');
    }

    public function addProcess(Request $request)
    {
        DB::table('alternatif')->insert([
            'name' => $request->name
        ]);
        return redirect('alternatif')->with('status', 'Berhasil menambahkan!');
    }

    public function edit($id)
    {
        $alternatif = DB::table('alternatif')->where('id', $id)->first();
        return view('alternatif.edit', compact('alternatif'));
    }

    public function editProcess(Request $request, $id)
    {
        DB::table('alternatif')->where('id', $id)
        ->update([
            'name' => $request->name
        ]);
        return redirect('alternatif')->with('status', 'Berhasil diupdate!');
    }

    public function delete($id)
    {
        DB::table('alternatif')->where('id', $id)->delete();
        return redirect('alternatif')->with('status', 'Berhasil dihapus!');
    }
}
