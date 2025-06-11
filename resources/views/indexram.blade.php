@extends('template')

@section('content')

    <h3>Data RAM</h3>

    <!-- Menampilkan pesan sukses jika ada -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol untuk menambah RAM -->
    <a href="ram/tambah" class="btn btn-primary">+ Tambah RAM Baru</a>
    <p>Cari Data RAM :</p>

    <!-- Form Pencarian RAM -->
    <form action="ram/cari" method="GET">
        <input type="text" class="form-control" name="cari" placeholder="Cari RAM ..">
        <input type="submit" class="btn btn-info" value="CARI">
    </form>
    <br/>

    <!-- Tabel Data RAM -->
    <table class="table table-striped">
        <tr>
            <th>Merk RAM</th>
            <th>Harga RAM</th>
            <th>Tersedia</th>
            <th>Berat</th>
            <th>Opsi</th>
        </tr>

        @foreach($ram as $r)
        <tr>
            <td>{{ $r->merkRAM }}</td>
            <td>{{ $r->hargaRAM }}</td>
            <td>{{ $r->tersedia ? 'Tersedia' : 'Tidak Tersedia' }}</td>
            <td>{{ $r->berat }}</td>
            <td>
                <!-- Tombol Edit RAM -->
                <a href="/ram/edit/{{ $r->ID }}" class="btn btn-success">Edit</a>

                <!-- Tombol Hapus RAM -->
                <form action="/ram/hapus/{{ $r->ID }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data RAM ini?')">
                    @csrf
                    @method('DELETE') <!-- Menyimulasikan metode DELETE -->
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <!-- Pagination -->
    {{ $ram->links() }}

@endsection