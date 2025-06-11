@extends('template')

@section('content')
    <h3>Edit Data Karyawan</h3>

    <a href="/karyawan" class="btn btn-info">Kembali</a>

    <br/>
    <br/>

    @foreach($karyawan as $k)
    <form action="/karyawan/update" method="post">
        {{ csrf_field() }}
        <!-- Kode Pegawai (hidden, karena PK tidak boleh diubah) -->
        <input type="hidden" name="kodepegawai" value="{{ $k->kodepegawai }}">

        <!-- Form Nama Lengkap -->
        <div class="row mb-3">
            <div class="col-3">
                Nama Lengkap
            </div>
            <div class="col-4">
                <input type="text" name="namalengkap" required="required" value="{{ $k->namalengkap }}" class="form-control">
            </div>
        </div>

        <!-- Form Divisi -->
        <div class="row mb-3">
            <div class="col-3">
                Divisi
            </div>
            <div class="col-4">
                <input type="text" name="divisi" required="required" maxlength="5" value="{{ $k->divisi }}" class="form-control">
            </div>
        </div>

        <!-- Form Departemen -->
        <div class="row mb-3">
            <div class="col-3">
                Departemen
            </div>
            <div class="col-4">
                <input type="text" name="departemen" required="required" maxlength="10" value="{{ $k->departemen }}" class="form-control">
            </div>
        </div>

        <input type="submit" value="Simpan Data" class="btn btn-success">
    </form>
    @endforeach

@endsection