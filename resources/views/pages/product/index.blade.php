@extends('layouts.master')

@section('title')
    <div class="page-heading">
        <h3>Produk</h3>
    </div>
@endsection


@section('content')
    <section class="section">
        <div class="card mb-3">
            <div class="card-header">
                <button type="button" class="btn btn-outline-primary block" onclick="create()">
                    Tambah Produk
                </button>
                <button type="button" class="btn btn-outline-primary block" onclick="importData()">
                    Import Produk
                </button>
            </div>

            <div class="card-body">
                <!-- table head dark -->
                <div class="table-responsive">
                    <table class="table mb-0" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th width="5%">NO</th>
                                <th>NAMA PRODUK</th>
                                <th>KATEGORI</th>
                                <th>HARGA</th>
                                <th>STOK</th>
                                <th>DESKRIPSI</th>
                                <th>IMAGE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @include('components.modals.product.create')
    @include('components.modals.product.import')
    @include('components.modals.product.edit')
@endsection

@push('script')
    @include('components.scripts.datatables')
    @include('components.scripts.sweetalert')

    @include($script)
@endpush
