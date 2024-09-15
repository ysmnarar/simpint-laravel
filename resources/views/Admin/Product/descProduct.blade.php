<!-- Modal -->
<div class="modal fade" id="desc{{ $row->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Description Book</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.desc.product', $row->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-control">Writer Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $row->writer_name }}" readonly><br>

                        <label for="title" class="form-control">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $row->title }}" readonly><br>

                        <label for="category_id" class="form-control">Category</label>
                        <input type="text" class="form-control" name="category_id" value="{{ $row->category_id }}" readonly><br>

                        <label for="desc" class="form-control">Deskripsi</label>
                        <textarea class="form-control" name="desc" rows="5" readonly>{{ $row->desc }}</textarea>
                        <input type="hidden" name="id" value="{{$row->id}}">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
