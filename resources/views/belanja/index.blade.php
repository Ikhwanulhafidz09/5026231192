@extends('template')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Data Belanja</h3>
        <a href="/belanja/tambah" class="btn btn-primary">+ Beli</a>
    </div>

    <table class="table table-striped">
        <tr>
            <th>Kode Pembelian</th>
            <th>Kode Barang</th>
            <th>Jumlah Pembelian </th>
            <th>Harga Per Item</th>
            <th>Total</th>
            <th>Action</th>

        </tr>
       @foreach ($belanja as $b)
            <tr>
                <td>{{ $b->ID }}</td>
                <td>{{ $b->KodeBarang }}</td>
                <td>{{ $b->Jumlah }}</td>
                <td>Rp{{ number_format($b->Harga, 0, ',', '.') }}</td>
                <td>Rp{{ number_format($b->Jumlah * $b->Harga, 0, ',', '.') }}</td>
                <td>
                    <a href="/belanja/hapus/{{ $b->ID }}" class="btn btn-danger">Batal</a>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $belanja->links() }}
@endsection