<!-- Modal -->
<div class="modal fade" id="antri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ambil Antrian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach ($tujuan as $item)
                    <a href="{{ route('antrian.cetak', $item->name) }}"
                        class="btn btn-danger btn-block mb-4">{{ $item->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
