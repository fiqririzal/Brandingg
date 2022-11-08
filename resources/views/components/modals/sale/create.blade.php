<form id="createForm">
    <div class="modal fade text-left" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModal">Pilih Product</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="product">Pilih Produk</label>
                        <select class="form-select" name="product" id="product">
                            <option value="" selected disabled>Pilih Produk</option>
                            @foreach ($products as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="category" id="category" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" name="price" id="price" class="form-control" readonly>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Kuantitas</label>
                        <input type="number" name="quantity" id="quantity" class="form-control">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="total">Total Harga</label>
                        <input type="number" name="total" id="total" class="form-control" readonly>
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
