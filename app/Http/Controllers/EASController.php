<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EASController extends Controller
{
    // Menampilkan semua data karyawan
    public function index()
    {
        $EAS = DB::table('newkaryawan')->paginate(10);
        return view('EAS.indexEAS', ['EAS' => $EAS]);
    }

    // Menampilkan form untuk menambah karyawan
    public function tambah()
    {
        return view('EAS.tambahEAS');
    }

    // Menyimpan data karyawan baru
    public function store(Request $request)
    {
        $request->validate([
            'NIP' => 'required|numeric',
            'nama' => 'required|max:50',
            'pangkat' => 'required|max:15',
            'gaji' => 'required|numeric'
        ]);

        DB::table('newkaryawan')->insert([
            'NIP' => $request->NIP,
            'nama' => $request->nama,
            'pangkat' => $request->pangkat,
            'gaji' => $request->gaji
        ]);

        return redirect('/EAS')->with('success', 'Data karyawan berhasil ditambahkan!');
    }

    // Menyimpan hasil update data
    public function update(Request $request)
    {
        $request->validate([
            'NIP' => 'required|numeric',
            'nama' => 'required|max:50',
            'pangkat' => 'required|max:15',
            'gaji' => 'required|numeric'
        ]);

        DB::table('newkaryawan')->where('id', $request->id)->update([
            'NIP' => $request->NIP,
            'nama' => $request->nama,
            'pangkat' => $request->pangkat,
            'gaji' => $request->gaji
        ]);

        return redirect('/EAS')->with('success', 'Data karyawan berhasil diubah!');
    }

    // Menghapus data karyawan
    public function hapus($NIP)
{
    DB::table('newkaryawan')->where('NIP', $NIP)->delete();
    return redirect('/EAS')->with('success', 'Data karyawan berhasil dihapus!');
}


    // Menyaring data berdasarkan pencarian nama
    public function cari(Request $request)
    {
        $cari = $request->cari;

        $EAS = DB::table('newkaryawan')
            ->where('nama', 'like', '%' . $cari . '%')
            ->paginate(10);

        return view('EAS.indexEAS', ['EAS' => $EAS, 'cari' => $cari]);
    }
}
