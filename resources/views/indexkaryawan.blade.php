@extends('template')

@section('content')

    <h3>Data Karyawan</h3>

    <!-- Menampilkan pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Menampilkan pesan error -->
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <!-- Tombol untuk menambah data karyawan -->
    <a href="karyawan/tambah" class="btn btn-primary">+ Tambah Data Karyawan</a>

    <p>Cari Data Karyawan :</p>

    <!-- Form Pencarian Karyawan -->
    <form action="karyawan/cari" method="GET">
        <input type="text" class="form-control" name="cari" placeholder="Cari nama atau divisi...">
        <input type="submit" class="btn btn-info mt-2" value="CARI">
    </form>
    <br/>

    <!-- Tabel Data Karyawan -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Kode Pegawai</th>
                <th>Nama Lengkap</th>
                <th>Divisi</th>
                <th>Departemen</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($karyawan as $k)
            <tr>
                <td>{{ $k->kodepegawai }}</td>
                <!-- Tampilkan huruf kapital semua -->
                <td>{{ strtoupper($k->namalengkap) }}</td>
                <td>{{ $k->divisi }}</td>
                <!-- Tampilkan huruf kecil semua -->
                <td>{{ strtolower($k->departemen) }}</td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="/karyawan/edit/{{ $k->kodepegawai }}" class="btn btn-success">Edit</a>

                    <!-- Tombol Hapus -->
                    <form action="/karyawan/hapus/{{ $k->kodepegawai }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data karyawan ini?')">
                        @csrf
                        @method('DELETE') <!-- Menyimulasikan metode DELETE -->
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $karyawan->links() }}

@endsection