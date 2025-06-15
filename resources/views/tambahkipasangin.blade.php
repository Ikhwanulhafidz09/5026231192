@extends('template')

@section('content')
    <h3>Tambah Kipas Angin Baru</h3>

    <a href="/kipasangin" class="btn btn-info"> Kembali</a>

    <br/>
    <br/>

    <!-- Form untuk menambah data kipas angin -->
    <form action="/kipasangin/store" method="post">
        {{ csrf_field() }}

        <!-- Form untuk Merk Kipas Angin -->
        <div class="row mb-3">
            <div class="col-3">
                Merk Kipas Angin
            </div>
            <div class="col-4">
                <input type="text" name="merkkipasangin" required="required" class="form-control">
            </div>
        </div>

        <!-- Form untuk Harga -->
        <div class="row mb-3">
            <div class="col-3">
                Harga
            </div>
            <div class="col-4">
                <input type="number" name="hargakipasangin" required="required" class="form-control">
            </div>
        </div>

        <!-- Form untuk Tersedia -->
        <div class="row mb-3">
            <div class="col-3">
                Tersedia
            </div>
            <div class="col-4">
                <input type="hidden" name="tersedia" value="0">
                <input type="checkbox" name="tersedia" value="1">
            </div>
        </div>

        <!-- Form untuk Berat -->
        <div class="row mb-3">
            <div class="col-3">
                Berat
            </div>
            <div class="col-4">
                <input type="number" name="berat" step="0.1" required="required" class="form-control">
            </div>
        </div>

        <input type="submit" value="Simpan Data" class="btn btn-success">
    </form>

@endsection
