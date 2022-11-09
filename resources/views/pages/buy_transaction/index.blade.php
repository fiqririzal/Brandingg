@extends('layouts.master')

@section('title')
    <div class="page-heading">
        <h3>Transaksi Pembelian</h3>
    </div>
@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <button type="button" class="btn btn-outline-primary block" onclick="create()">
                Beli Produk
            </button>
        </div>

        <div class="card-body">
            <!-- table head dark -->
            <div class="table-responsive">
                <table class="table mb-0" id="table_transaction">
                    <thead class="thead-dark">
                        <tr>
                            <th width="5%">NO</th>
                            <th>SUPPLIER</th>
                            <th>KATEGORI</th>
                            <th>PRODUK</th>
                            <th>JUMLAH BARANG</th>
                            <th>TOTAL HARGA</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('components.modals.buy_transaction.create')
@endsection

@push('script')
    @include('components.scripts.datatables')
    @include('components.scripts.sweetalert')

    @include($script)
@endpush
