@extends('layouts.master')

@section('title')
    <div class="page-heading">
        <h3>Categories</h3>
    </div>
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Table head options</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <p>Similar to tables and dark tables, use the modifier classes <code
                            class="highlighter-rouge">.thead-light</code> or <code
                            class="highlighter-rouge">.thead-dark</code> to
                        make <code class="highlighter-rouge">&lt;thead&gt;</code>s appear light or dark gray.
                    </p>
                </div>
                <!-- table head dark -->
                <div class="table-responsive">
                    <button type="button" class="btn btn-primary me-1 mb-1" onclick="create()">Tambah Kategori</button>
                    <table class="table mb-0" id="category">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr>
                            <td class="text-bold-500">Tiffani Blogz</td>
                            <td>$15/hr</td>
                            <td class="text-bold-500">Animation</td>
                            <td>Remote</td>
                            <td>Austin,Texas</td>
                            <td><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail badge-circle badge-circle-light-secondary font-medium-1"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></a></td>
                        </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('components.modals.category.create')
    @include('components.modals.category.edit')
    {{-- @include('components.modals.rental.edit')
@include('components.modals.rental.sewa') --}}

    @push('script')
        @include('components.scripts.datatables')
        @include('components.scripts.sweetalert')

        @include($script)
    @endpush
@endsection
