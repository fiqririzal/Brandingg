@extends('layouts.master')

@section('title')
    <div class="page-heading">
        <h3>Supplier</h3>
    </div>
@endsection


@section('content')
    <section class="section">
        <div class="card mb-3">
            <div class="card-header">
                <button type="button" class="btn btn-outline-primary block" onclick="create()">
                    Tambah Supplier
                </button>
            </div>

            <div class="card-body">
                <!-- table head dark -->
                <div class="table-responsive">
                    <table class="table mb-0" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th width="5%">NO</th>
                                <th>NAMA TOKO</th>
                                <th>ALAMAT</th>
                                <th width="20%">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @include('components.modals.supplier.create')
    @include('components.modals.supplier.edit')

    @push('script')
        @include('components.scripts.datatables')
        @include('components.scripts.sweetalert')

        @include($script)
    @endpush
@endsection
