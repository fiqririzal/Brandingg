<form id="createForm">
    <div class="modal fade text-left" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModal">Tambah Supplier</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Supplier</label>
                        <input type="text" name="name" id="name" class="form-control">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="name">Alamat</label>
                        <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" id="createSubmit">Tambah
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
