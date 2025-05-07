@extends('Server.layout.app')

@section('title', 'Edit Tujuan - Web Nomor Antrian')

@section('header-title', 'Edit Tujuan')

@section('breadcrumbs')
    <div class="breadcrumb-item">Tujuan</div>
    <div class="breadcrumb-item active"><a href="#">Edit</a></div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title mb-4">
                <a href="{{ route('tujuan') }}" class="btn btn-warning">Kembali</a>
            </div>
            <form action="{{ route('tujuan.update', $tujuan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" placeholder="Nama Tujuan Antrian"
                        value="{{ $tujuan->name }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kode</label>
                    <input type="text" name="kode" class="form-control" placeholder="Kode Tujuan Antrian"
                        value="{{ $tujuan->kode }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
