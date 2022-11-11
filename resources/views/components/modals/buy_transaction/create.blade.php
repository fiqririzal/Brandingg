<form id="createForm">
    <div class="modal fade text-left" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Beli Produk</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Supplier</label>
                        <select class="form-select" name="supplier" id="supplier">
                            <option value="" selected disabled>Pilih Supplier</option>
                            @foreach ($supplier as $id => $item)
                                <option value="{{ $id }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <select class="form-select" name="category" id="category">
                            <option value="" selected disabled>Pilih Kategori</option>
                            @foreach ($category as $id => $item)
                                <option value="{{ $id }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="product">Produk</label>
                        <select class="form-select" name="product" id="product">
                            <option value="" selected disabled>Pilih Produk</option>
                            @foreach ($product as $id => $item)
                                <option value="{{ $id }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="qty">Harga Beli </label>
                        <input type="number" name="price" id="price" class="form-control">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="qty">Jumlah Pembelian</label>
                        <input type="number" name="qty" id="qty" class="form-control">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="cost">Total Harga</label>
                        <input type="number" name="cost" id="cost" class="form-control" readonly>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary" id="createSubmit">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</form>
