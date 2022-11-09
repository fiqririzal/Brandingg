@extends('layouts.master')

@section('title')
    <div class="page-heading">
        <h3>Dashboard</h3>
        <div class="alert alert-info mt-3">
            <h4 class="alert-heading">{{ ucwords(Auth::user()->name) }}</h4>
            <p>
                Sebagai : HARUSNYA ROLE
            </p>
        </div>
    </div>
@endsection

@section('content')
@endsection

@push('script')
@endpush
