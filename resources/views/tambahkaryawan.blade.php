@extends('template')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Terjadi kesalahan:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul><input type="text" name="departemen" required="required" maxlength="10" class="form-control">

    </div>
@endif

    <h3>Tambah Data Karyawan Baru</h3>

    <a href="/karyawan" class="btn btn-info">Kembali</a>

    <br/>
    <br/>

    <!-- Form untuk menambah data karyawan dengan tampilan horizontal -->
    <form action="/karyawan/store" method="post">
        {{ csrf_field() }}

        <!-- Form Kode Pegawai -->
        <div class="row mb-3">
            <div class="col-3">
                Kode Pegawai
            </div>
            <div class="col-4">
                <input type="text" name="kodepegawai" required="required" maxlength="5" class="form-control">
            </div>
        </div>

        <!-- Form Nama Lengkap -->
        <div class="row mb-3">
            <div class="col-3">
                Nama Lengkap
            </div>
            <div class="col-4">
                <input type="text" name="namalengkap" required="required" maxlength="50" class="form-control">
            </div>
        </div>

        <!-- Form Divisi -->
        <div class="row mb-3">
            <div class="col-3">
                Divisi
            </div>
            <div class="col-4">
                <input type="text" name="divisi" required="required" maxlength="5" class="form-control">
            </div>
        </div>

        <!-- Form Departemen -->
        <div class="row mb-3">
            <div class="col-3">
                Departemen
            </div>
            <div class="col-4">
                <input type="text" name="departemen" required="required" maxlength="10" class="form-control">
            </div>
        </div>

        <input type="submit" value="Simpan Data" class="btn btn-success">
    </form>

@endsection