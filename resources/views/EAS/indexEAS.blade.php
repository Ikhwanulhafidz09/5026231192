@extends('template')

@section('content')

    <h3>New Karyawan</h3>

    <!-- Menampilkan pesan sukses jika ada -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol untuk menambah Data Karyawan -->
    <a href="/EAS/tambah" class="btn btn-primary">+ Tambah data</a>
    <p>Cari Data Karyawan :</p>

    <!-- Form Pencarian -->
    <form action="/EAS/cari" method="GET">
        <input type="text" class="form-control" name="cari" placeholder="Cari karyawan ..">
        <input type="submit" class="btn btn-info mt-2" value="CARI">
    </form>
    <br/>

    <!-- Tabel Data Karyawan -->
    <table class="table table-striped">
        <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th>Pangkat</th>
            <th>Gaji</th>
        </tr>

        @foreach($EAS as $k)
        <tr>
            <td>{{ $k->NIP }}</td>
            <td>{{ $k->nama }}</td>
            <td>{{ $k->pangkat}}</td>
            <td>{{ $k->gaji }}</td>
            <td>

                <form action="/EAS/hapus/{{ $k->NIP }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <!-- Pagination -->
    {{ $EAS->links() }}

@endsection
