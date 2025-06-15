@extends('template')

@section('content')
    <a href="/belanja" class="btn btn-info"> Kembali</a>

    <br />
    <br />

    <form action="/belanja/store" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-3">
                <p>Kode Barang</p>
            </div>
            <div class="col-9 d-flex align-items-center">
                <span class="mr-2">:</span>
                <input type="number" name="kodeBarang" id="kodeBarang" required="required" class="form-control"
                    style="flex:1" autocomplete="off" inputmode="numeric">
            </div>

            <div class="col-3">
                <p>Jumlah Beli</p>
            </div>
            <div class="col-9 d-flex align-items-center">
                <span class="mr-2">:</span>
                <input type="number" name="jumlahBeli" id="jumlahBeli" required="required" class="form-control"
                    style="flex:1" autocomplete="off" inputmode="numeric" min="0">
            </div>

            <div class="col-3">
                <p>Harga per item</p>
            </div>
            <div class="col-9 d-flex align-items-center">
                <span class="mr-2">:</span>
                <input type="number" name="hargaBarang" id="hargaBarang" required="required" class="form-control"
                    style="flex:1" autocomplete="off" inputmode="numeric">
            </div>

            <div class="col-3">
                <p>Total</p>
            </div>
            <div class="col-9 d-flex align-items-center">
                <span class="mr-2">:</span>
                <input type="text" name="total" id="total" class="form-control" style="flex:1" readonly>
            </div>




            <div class="col-9"></div>
            <div class="col-3 mt-2">
                <input type="submit" value="Simpan Data" class="btn btn-success">
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Format harga dan hitung total
            const hargaInput = document.getElementById('hargaBarang');
            const jumlahInput = document.getElementById('jumlahBeli');
            const totalInput = document.getElementById('total');

            function getNumericValue(str) {
                return parseInt(String(str).replace(/[^0-9]/g, '')) || 0;
            }

            function formatRupiah(angka) {
                return angka.toLocaleString('id-ID');
            }

            function hitungTotal() {
                let jumlah = getNumericValue(jumlahInput.value);
                let harga = getNumericValue(hargaInput.value);
                let total = jumlah * harga;
                totalInput.value = total ? formatRupiah(total) : '';
            }

            hargaInput.addEventListener('input', function(e) {
                let value = this.value.replace(/[^0-9]/g, '');
                if (value) {
                    this.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                } else {
                    this.value = '';
                }
                hitungTotal();
            });

            jumlahInput.addEventListener('input', function() {
                hitungTotal();
            });

            // Inisialisasi total saat halaman dimuat
            hitungTotal();
        });
    </script>
@endpush