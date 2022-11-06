<form id="editForm">
    <div class="modal fade text-left" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModal">Tambah Supplier</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Supplier</label>
                        <input type="text" name="name" id="editname" class="form-control">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="name">Alamat</label>
                        <textarea class="form-control" name="address" id="editaddress" rows="3"></textarea>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" id="editSubmit">Edit
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
