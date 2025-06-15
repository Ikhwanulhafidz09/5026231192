<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KipasAnginController extends Controller
{
    // Menampilkan semua data kipas angin
    public function index()
    {
        $kipasangin = DB::table('kipasangin')->paginate(10);
        return view('indexkipasangin', ['kipasangin' => $kipasangin]);
    }

    // Menampilkan form untuk menambah kipas angin
    public function tambah()
    {
        return view('tambahkipasangin');
    }

    // Menyimpan data kipas angin baru
    public function store(Request $request)
    {
        $request->validate([
            'merkkipasangin' => 'required|max:25',
            'hargakipasangin' => 'required|integer',
            'tersedia' => 'required|boolean',
            'berat' => 'required|numeric'
        ]);

        DB::table('kipasangin')->insert([
            'merkkipasangin' => $request->merkkipasangin,
            'hargakipasangin' => $request->hargakipasangin,
            'tersedia' => $request->tersedia,
            'berat' => $request->berat
        ]);

        return redirect('/kipasangin')->with('success', 'Data kipas angin berhasil ditambahkan!');
    }

    // Menampilkan form edit kipas angin
    public function edit($id)
    {
        $kipasangin = DB::table('kipasangin')->where('ID', $id)->get();
        return view('editkipasangin', ['kipasangin' => $kipasangin]);
    }

    // Menyimpan perubahan data kipas angin
    public function update(Request $request)
    {
        $request->validate([
            'merkkipasangin' => 'required|max:25',
            'hargakipasangin' => 'required|integer',
            'tersedia' => 'required|boolean',
            'berat' => 'required|numeric'
        ]);

        DB::table('kipasangin')->where('ID', $request->ID)->update([
            'merkkipasangin' => $request->merkkipasangin,
            'hargakipasangin' => $request->hargakipasangin,
            'tersedia' => $request->tersedia,
            'berat' => $request->berat
        ]);

        return redirect('/kipasangin')->with('success', 'Data kipas angin berhasil diubah!');
    }

    // Menghapus data kipas angin
    public function hapus($id)
    {
        DB::table('kipasangin')->where('ID', $id)->delete();
        return redirect('/kipasangin')->with('success', 'Data kipas angin berhasil dihapus!');
    }

    // Menyaring data berdasarkan pencarian
    public function cari(Request $request)
    {
        $cari = $request->cari;

        $kipasangin = DB::table('kipasangin')
            ->where('merkkipasangin', 'like', "%" . $cari . "%")
            ->paginate();

        return view('indexkipasangin', ['kipasangin' => $kipasangin, 'cari' => $cari]);
    }
}
