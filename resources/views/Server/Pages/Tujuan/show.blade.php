@extends('Server.layout.app')

@section('title', 'Show Tujuan - Web Nomor Antrian')

@section('header-title', 'Show Tujuan')

@section('breadcrumbs')
    <div class="breadcrumb-item">Tujuan</div>
    <div class="breadcrumb-item active"><a href="#">Show {{ $tujuan->name }}</a></div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <a href="{{ route('tujuan') }}" class="btn btn-warning">Kembali</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>{{ $tujuan->name }}</th>
                        </tr>
                        <tr>
                            <th>Kode</th>
                            <th>{{ $tujuan->kode }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
