@extends('template')

@section('content')
    <h3>Tambah RAM Baru</h3>

    <a href="/ram" class="btn btn-info"> Kembali</a>

    <br/>
    <br/>

    <!-- Form untuk menambah data RAM dengan tampilan yang konsisten -->
    <form action="/ram/store" method="post">
        {{ csrf_field() }}

        <!-- Form untuk Merk RAM -->
        <div class="row mb-3">
            <div class="col-3">
                Merk RAM
            </div>
            <div class="col-4">
                <input type="text" name="merkRAM" required="required" class="form-control">
            </div>
        </div>

        <!-- Form untuk Harga RAM -->
        <div class="row mb-3">
            <div class="col-3">
                Harga RAM
            </div>
            <div class="col-4">
                <input type="number" name="hargaRAM" required="required" class="form-control">
            </div>
        </div>

        <!-- Form untuk Tersedia (Checkbox) -->
        <div class="row mb-3">
            <div class="col-3">
                Tersedia
            </div>
            <div class="col-4">
                <input type="hidden" name="tersedia" value="0">
                <input type="checkbox" name="tersedia" value="1">
            </div>
        </div>

        <!-- Form untuk Berat RAM -->
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