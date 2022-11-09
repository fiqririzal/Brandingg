@extends('layouts.master')

@section('title')
    <div class="page-heading">
        <h3>Kategori</h3>
    </div>
@endsection

@section('content')
    <section class="section">
        <div class="card mb-3">
            <div class="card-header">
                <button type="button" class="btn btn-outline-primary block" onclick="create()">
                    Tambah Kategori
                </button>
                <button type="button" class="btn btn-outline-primary block" onclick="importData()">
                    Import Kategori
                </button>
            </div>

            <div class="card-body">
                <!-- table head dark -->
                <div class="table-responsive">
                    <table class="table mb-0" id="category">
                        <thead class="thead-dark">
                            <tr>
                                <th width="5%">NO</th>
                                <th>KATEGORI</th>
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
    @include('components.modals.category.create')
    @include('components.modals.category.edit')
    @include('components.modals.category.import')
@endsection


@push('script')
    @include('components.scripts.datatables')
    @include('components.scripts.sweetalert')
    @include($script)
@endpush
