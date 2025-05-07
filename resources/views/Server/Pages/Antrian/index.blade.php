@extends('Server.layout.app')

@section('title', 'Antrian - Web Nomor Antrian')

@section('header-title', 'Antrian')

@section('breadcrumbs')
    <div class="breadcrumb-item active"><a href="{{ route('antrian') }}">Antrian</a></div>
@endsection

@php
    $no = 1;
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <a href="#" data-toggle="modal" data-target="#antri" class="btn btn-primary">Cetak Antrian</a>
                @include('Server.Components.Modal.cetakAntri')
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Tujuan</th>
                            <th>Nomor Panggilan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($antrian as $item)
                            <tr class="text-center" id="nomor_antri_{{ $item->id }}">
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    {{ $item->kode }}{{ $item->nomor }}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning"
                                        onclick="bacaTeks('Nomor Antrian........................... {{ $item->kode }}{{ $item->nomor }}................ Silakan menuju ke ruangan.')">
                                        <i class="fa fa-volume-up"></i> Panggil
                                    </button>
                                    <a href="{{ route('antrian.selesai', $item->id) }}" class="btn btn-success"><i
                                            class="fa fa-check"></i> Selesai</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <script>
        function bacaTeks(teks) {
            const ucapan = new SpeechSynthesisUtterance(teks);
            ucapan.lang = 'id-ID';
            window.speechSynthesis.speak(ucapan);
        }

        $(document).ready(function() {
            setInterval(function() {
                cache_clear()
            }, 4000);
        });

        function cache_clear() {
            window.location.reload(true);
        }
    </script>
@endpush
