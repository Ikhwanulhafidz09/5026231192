@extends('template')

@section('content')
    <h3>Tambah Data Karyawan Baru</h3>

    <a href="/EAS" class="btn btn-info"> Kembali</a>

    <br/>
    <br/>

    <form action="/EAS/store" method="post">
        {{ csrf_field() }}

        <!-- Form untuk NIP -->
        <div class="row mb-3">
            <div class="col-3">
                NIP
            </div>
            <div class="col-4">
                <input type="number" name="NIP" required="required" class="form-control">
            </div>
        </div>

        <!-- Form untuk Nama -->
        <div class="row mb-3">
            <div class="col-3">
                Nama
            </div>
            <div class="col-4">
                <input type="text" name="nama" required="required" class="form-control">
            </div>
        </div>

        <!-- Form untuk Pangkat -->
        <div class="row mb-3">
            <div class="col-3">
                Pangkat
            </div>
            <div class="col-4">
                <input type="text" name="pangkat" required="required" class="form-control">
            </div>
        </div>

        <!-- Form untuk Gaji -->
        <div class="row mb-3">
            <div class="col-3">
                Gaji
            </div>
            <div class="col-4">
                <input type="number" name="gaji" required="required" class="form-control">
            </div>
        </div>

        <input type="submit" value="Simpan Data" class="btn btn-success">
    </form>
@endsection
