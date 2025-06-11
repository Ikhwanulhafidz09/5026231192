@extends('template')

@section('content')
    <h3>Edit Pegawai</h3>

    <a href="/pegawai" class="btn btn-info"> Kembali</a>

    <br/>
    <br/>

    <!-- Form untuk mengedit data pegawai dengan tampilan yang konsisten -->
    <form action="/pegawai/update" method="post">
        {{ csrf_field() }}

        <!-- Hidden field untuk id pegawai -->
        <input type="hidden" name="id" value="{{ $pegawai->pegawai_id }}">

        <div class="row">
            <div class="col-3">
                Nama
            </div>
            <div class="col-8">
                <input type="text" name="nama" required="required" class="form-control" value="{{ $pegawai->pegawai_nama }}">
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                Jabatan
            </div>
            <div class="col-8">
                <input type="text" name="jabatan" required="required" class="form-control" value="{{ $pegawai->pegawai_jabatan }}">
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                Umur
            </div>
            <div class="col-8">
                <input type="number" name="umur" required="required" class="form-control" value="{{ $pegawai->pegawai_umur }}">
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                Alamat
            </div>
            <div class="col-8">
                <textarea name="alamat" required="required" class="form-control">{{ $pegawai->pegawai_alamat }}</textarea>
            </div>
        </div>

        <br/>
        <input type="submit" value="Simpan Data" class="btn btn-success">
    </form>
@endsection