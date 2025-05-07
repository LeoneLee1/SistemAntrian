@extends('Server.layout.app')

@section('title', 'Edit User - Web Nomor Antrian')

@section('header-title', 'Edit User')

@section('breadcrumbs')
    <div class="breadcrumb-item">User</div>
    <div class="breadcrumb-item active"><a href="#">Edit</a></div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title mb-4">
                <a href="{{ route('user') }}" class="btn btn-warning">Kembali</a>
            </div>
            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" placeholder="Nama Lengkap"
                        value="{{ $user->name }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username"
                        value="{{ $user->username }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="text" name="password" class="form-control" placeholder="*******">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
