@extends('template')

@section('content')

    <h3>Data Kipas Angin</h3>

    <!-- Menampilkan pesan sukses jika ada -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol untuk menambah Kipas Angin -->
    <a href="/kipasangin/tambah" class="btn btn-primary">+ Tambah Kipas Angin Baru</a>
    <p>Cari Data Kipas Angin :</p>

    <!-- Form Pencarian -->
    <form action="/kipasangin/cari" method="GET">
        <input type="text" class="form-control" name="cari" placeholder="Cari Kipas Angin ..">
        <input type="submit" class="btn btn-info mt-2" value="CARI">
    </form>
    <br/>

    <!-- Tabel Data Kipas Angin -->
    <table class="table table-striped">
        <tr>
            <th>Merk</th>
            <th>Harga</th>
            <th>Tersedia</th>
            <th>Berat</th>
            <th>Opsi</th>
        </tr>

        @foreach($kipasangin as $k)
        <tr>
            <td>{{ $k->merkkipasangin }}</td>
            <td>{{ $k->hargakipasangin }}</td>
            <td>{{ $k->tersedia ? 'Tersedia' : 'Tidak Tersedia' }}</td>
            <td>{{ $k->berat }}</td>
            <td>
                <a href="/kipasangin/edit/{{ $k->ID }}" class="btn btn-success">Edit</a>

                <form action="/kipasangin/hapus/{{ $k->ID }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <!-- Pagination -->
    {{ $kipasangin->links() }}

@endsection
