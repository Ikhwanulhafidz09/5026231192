<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BelanjaController extends Controller
{
    public function index()
	{
    	// mengambil data dari table pegawai
		// $pegawai = DB::table('pegawai')->get();
		$belanja = DB::table('keranjangbelanja')->paginate(10);

    	// mengirim data belanja ke view index
		return view('belanja.index',['belanja' => $belanja]);

	}

    public function tambah()
	{

		// memanggil view tambah
		return view('belanja.tambah');

	}

    public function store(Request $request){
        // Validasi opsional
        $request->validate([
            'kodeBarang' => 'required|numeric',
            'jumlahBeli' => 'required|numeric|min:1',
            'hargaBarang' => 'required|numeric|min:0',
        ]);

        // Hapus titik pemisah ribuan jika ada
        $hargaperitem = str_replace('.', '', $request->hargaBarang);

        // Simpan ke database
        DB::table('keranjangbelanja')->insert([
            'kode_barang' => $request->kodeBarang,
            'jumlah' => $request->jumlahBeli,
            'Harga' => $hargaperitem,
        ]);

        return redirect('/belanja');
    }

    public function hapus($id)
    {
        DB::table('keranjangbelanja')->where('id', $id)->delete();
        return redirect('/belanja');
    }
}