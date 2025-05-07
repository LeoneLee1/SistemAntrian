@extends('Server.layout.app')

@section('title', 'User - Web Nomor Antrian')

@section('header-title', 'Management User')

@section('breadcrumbs')
    <div class="breadcrumb-item active"><a href="{{ route('user') }}">User</a></div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <a href="{{ route('user.create') }}" class="btn btn-success">Create +</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="user-table">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <script>
        $(document).ready(function() {
            $('#user-table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 5,
                lengthMenu: [
                    [5, 50, 100, -1],
                    [5, 50, 100, "All"]
                ],
                ajax: '{{ route('user.json') }}',
                columns: [{
                        name: 'DT_RowIndex',
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'name',
                        name: 'name',
                        className: 'text-center'
                    },
                    {
                        data: 'username',
                        name: 'username',
                        className: 'text-center'
                    },
                    {
                        name: 'action',
                        data: 'id',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                        render: function(data, type, row) {
                            return '<a href="user/show/' + data +
                                '" class="btn btn-warning btn-sm">Show</a>&nbsp;&nbsp;' +
                                '<a href="user/edit/' + data +
                                '" class="btn btn-info btn-sm">Edit</a>&nbsp;&nbsp;' +
                                '<a href="user/delete/' + data +
                                '" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a>';
                        },
                    }
                ],
            });
        });
    </script>
@endpush
