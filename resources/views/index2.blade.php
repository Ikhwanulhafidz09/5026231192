@extends('template')

@section('content')
	<h3>Data Pegawai</h3>

    <!-- Menampilkan pesan berhasil jika ada -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

	    <a href="/pegawai/tambah"class="btn btn-primary"> + Tambah Pegawai Baru</a>
    <p>Cari Data Pegawai :</p>
	<form action="/pegawai/cari" method="GET">
		<input type="text" class="form-control" name="cari" placeholder="Cari Pegawai .."  >
		<input type="submit" class="btn btn-info" value="Cari">
	</form>
	<br/>

	<table class="table table-striped">
		<tr>
			<th>Nama</th>
			<th>Jabatan</th>
			<th>Umur</th>
			<th>Alamat</th>
			<th>Opsi</th>
		</tr>
		@foreach($pegawai as $p)
		<tr>
			<td>{{ $p->pegawai_nama }}</td>
			<td>{{ $p->pegawai_jabatan }}</td>
			<td>{{ $p->pegawai_umur }}</td>
			<td>{{ $p->pegawai_alamat }}</td>
			<td>
				<a href="/pegawai/edit/{{ $p->pegawai_id }}" class="btn btn-success">Edit</a>
				<!-- Form untuk Hapus dengan metode DELETE -->
                <form action="/pegawai/hapus/{{ $p->pegawai_id }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pegawai ini?')">
                    @csrf
                    @method('DELETE') <!-- Menyimulasikan metode DELETE -->
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
			</td>
		</tr>
        @endforeach
	</table>
{{ $pegawai->links() }}

@endsection