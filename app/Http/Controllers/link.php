<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class link extends Controller
{
    public function helloworld(){
    	return view('blog');
    }
    public function index(){
        $nama = "Diki Alafarabi Hadi";
        $umur = 35;
        $alamat = "surabaya";
        $matkul = ["Algoritma & Pemrograman","Kalkulus","Pemrograman Web"];
        return view('biodata', ['nama'=>$nama, 'umur'=>$umur , 'alamat'=>$alamat, 'matkul'=>$matkul]);
    }
}