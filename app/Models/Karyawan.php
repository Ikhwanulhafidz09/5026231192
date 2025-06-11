<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactor   y;

    protected $table = 'karyawan'; // Pastikan menggunakan nama tabel yang benar

    protected $fillable = [
        'kodepegawai',
        'namalengkap',
        'divisi',
        'departemen',
    ];

    public $timestamps = false; // Menonaktifkan timestamp otomatis (created_at, updated_at)
}
