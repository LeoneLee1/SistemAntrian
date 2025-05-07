@extends('Server.layout.app')

@section('title', 'Dashboard - Web Nomor Antrian')

@section('header-title', 'Dashboard')

@section('breadcrumbs')
    <div class="breadcrumb-item active"><a href="{{ route('admin') }}">Dashboard</a></div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Antrian</h5>
                    <span>{{ $antrian }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Tujuan</h5>
                    <span>{{ $tujuan }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Riwayat</h5>
                    <span>{{ $riwayat }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
