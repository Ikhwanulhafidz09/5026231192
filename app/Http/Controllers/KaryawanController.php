<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    // Menampilkan semua data karyawan
    public function index()
    {
        $karyawan = DB::table('karyawan')->paginate(10);
        return view('indexkaryawan', ['karyawan' => $karyawan]);
    }

    // Menampilkan form tambah data
    public function tambah()
    {
        return view('tambahkaryawan');
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kodepegawai' => 'required|size:5|unique:karyawan,kodepegawai',
            'namalengkap' => 'required|max:50',
            'divisi' => 'required|max:5',
            'departemen' => 'required|max:10',
        ]);

        try {
            DB::table('karyawan')->insert([
                'kodepegawai' => $request->kodepegawai,
                'namalengkap' => $request->namalengkap,
                'divisi' => $request->divisi,
                'departemen' => $request->departemen
            ]);

            return redirect('/karyawan')->with('success', 'Data karyawan berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect('/karyawan')->with('error', 'Data karyawan gagal disimpan: ' . $e->getMessage());
        }
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $karyawan = DB::table('karyawan')->where('kodepegawai', $id)->get();
        return view('editkaryawan', ['karyawan' => $karyawan]);
    }

    // Menyimpan perubahan data
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'namalengkap' => 'required|max:50',
            'divisi' => 'required|max:5',
            'departemen' => 'required|max:10',
        ]);

        try {
            DB::table('karyawan')->where('kodepegawai', $request->kodepegawai)->update([
                'namalengkap' => $request->namalengkap,
                'divisi' => $request->divisi,
                'departemen' => $request->departemen
            ]);

            return redirect('/karyawan')->with('success', 'Data karyawan berhasil diubah!');
        } catch (\Exception $e) {
            return redirect('/karyawan')->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    // Menghapus data
    public function hapus($id)
    {
        try {
            DB::table('karyawan')->where('kodepegawai', $id)->delete();
            return redirect('/karyawan')->with('success', 'Data karyawan berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect('/karyawan')->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    // Mencari data
    public function cari(Request $request)
    {
        $cari = $request->cari;

        $karyawan = DB::table('karyawan')
            ->where('namalengkap', 'like', "%" . $cari . "%")
            ->orWhere('divisi', 'like', "%" . $cari . "%")
            ->paginate();

        return view('indexkaryawan', ['karyawan' => $karyawan, 'cari' => $cari]);
    }
}