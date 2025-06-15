@extends('template')

@section('content')
    <h3>Edit Kipas angin</h3>

    <a href="/kipasangin" class="btn btn-info"> Kembali</a>

    <br/>
    <br/>

    @foreach($kipasangin as $k)
    <form action="/kipasangin/update" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="ID" value="{{ $k->ID }}"> <br/>

        <!-- Form untuk Merk Kipas Angin -->
        <div class="row mb-3">
            <div class="col-3">
                Merk Kipas angin
            </div>
            <div class="col-4">
                <input type="text" name="merkkipasangin" required="required" value="{{ $k->merkkipasangin }}">
            </div>
        </div>

        <!-- Form untuk Harga Kipas Angin -->
        <div class="row mb-3">
            <div class="col-3">
                Harga Kipas angin
            </div>
            <div class="col-4">
                <input type="number" name="hargakipasangin" required="required" value="{{ $k->hargakipasangin }}">
            </div>
        </div>

        <!-- Form untuk Tersedia (Checkbox) -->
        <div class="row mb-3">
            <div class="col-3">
                Tersedia
            </div>
            <div class="col-4">
                <input type="hidden" name="tersedia" value="0">
                <input type="checkbox" name="tersedia" value="1" {{ $k->tersedia ? 'checked' : '' }}>
            </div>
        </div>

        <!-- Form untuk Berat Kipas Angin -->
        <div class="row mb-3">
            <div class="col-3">
                Berat
            </div>
            <div class="col-4">
                <input type="number" name="berat" step="0.1" required="required" value="{{ $k->berat }}">
            </div>
        </div>

        <input type="submit" value="Simpan Data" class="btn btn-success">
    </form>
    @endforeach

@endsection
