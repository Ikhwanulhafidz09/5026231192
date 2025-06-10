<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RAMController extends Controller
{
    // Menampilkan semua data RAM
    public function index()
    {
        // Mengambil data dari tabel ram dengan pagination
        $ram = DB::table('ram')->paginate(10);  // Menampilkan 10 data per halaman

        // Mengirim data RAM ke view indexram
        return view('indexram', ['ram' => $ram]);
    }

    // Menampilkan form untuk menambah RAM
    public function tambah()
    {
        // Memanggil view untuk form tambah RAM
        return view('tambahram');
    }

    // Menyimpan data RAM baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'merkRAM' => 'required|max:25',
            'hargaRAM' => 'required|integer',
            'tersedia' => 'required|boolean',
            'berat' => 'required|numeric'
        ]);

        // Insert data ke tabel ram
        DB::table('ram')->insert([
            'merkRAM' => $request->merkRAM,
            'hargaRAM' => $request->hargaRAM,
            'tersedia' => $request->tersedia,
            'berat' => $request->berat
        ]);

        // Alihkan halaman ke halaman daftar RAM dengan pesan sukses
        return redirect('/ram')->with('success', 'Data RAM berhasil ditambahkan!');
    }

    // Menampilkan form untuk edit data RAM
    public function edit($id)
    {
        // Mengambil data RAM berdasarkan ID
        $ram = DB::table('ram')->where('ID', $id)->get();

        // Mengirim data RAM yang ditemukan ke view editram
        return view('editram', ['ram' => $ram]);
    }

    // Menyimpan perubahan data RAM
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'merkRAM' => 'required|max:25',
            'hargaRAM' => 'required|integer',
            'tersedia' => 'required|boolean',
            'berat' => 'required|numeric'
        ]);

        // Update data RAM di tabel ram berdasarkan ID
        DB::table('ram')->where('ID', $request->ID)->update([
            'merkRAM' => $request->merkRAM,
            'hargaRAM' => $request->hargaRAM,
            'tersedia' => $request->tersedia,
            'berat' => $request->berat
        ]);

        // Alihkan halaman ke halaman daftar RAM dengan pesan sukses
        return redirect('/ram')->with('success', 'Data RAM berhasil diubah!');
    }

    // Menghapus data RAM
    public function hapus($id)
    {
        // Menghapus data RAM berdasarkan ID
        DB::table('ram')->where('ID', $id)->delete();

        // Alihkan halaman ke halaman daftar RAM dengan pesan sukses
        return redirect('/ram')->with('success', 'Data RAM berhasil dihapus!');
    }

    // Menyaring data RAM berdasarkan pencarian
    public function cari(Request $request)
    {
        // Menangkap data pencarian
        $cari = $request->cari;

        // Mengambil data dari tabel ram sesuai pencarian
        $ram = DB::table('ram')
            ->where('merkRAM', 'like', "%" . $cari . "%")
            ->paginate();

        // Mengirim data RAM dan pencarian ke view indexram
        return view('indexram', ['ram' => $ram, 'cari' => $cari]);
    }
}