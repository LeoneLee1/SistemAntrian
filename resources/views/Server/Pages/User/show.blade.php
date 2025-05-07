@extends('Server.layout.app')

@section('title', 'Show User - Web Nomor Antrian')

@section('header-title', 'Show User')

@section('breadcrumbs')
    <div class="breadcrumb-item">User</div>
    <div class="breadcrumb-item active"><a href="#">Show {{ $user->name }}</a></div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <a href="{{ route('user') }}" class="btn btn-warning">Kembali</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>{{ $user->name }}</th>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <th>{{ $user->username }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
