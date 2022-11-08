<form id="createForm">
    <div class="modal" tabindex="-1" role="dialog" id="createModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
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
                        <label for="category">kategori</label>
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
                        <label for="qty">Jumlah Pembelian</label>
                        <input type="number" name="qty" id="qty" class="form-control">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="cost">Total Harga</label>
                        <input type="number" name="cost" id="cost" class="form-control">
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="createSubmit">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</form>
