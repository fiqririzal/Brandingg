<form id="createForm">
    <div class="modal fade text-left" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModal">Tambah Product</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama Produk</label>
                        <input type="text" name="name" id="name" class="form-control">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="name">Kategori</label>
                        <select class="form-select" name="category" id="kategori">
                            <option value="" selected disabled>Pilih Kategori</option>
                            @foreach ($category as $id => $item)
                                <option value="{{ $id }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="name">Harga</label>
                        <input type="number" name="price" id="price" class="form-control">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="name">Stok</label>
                        <input type="number" name="stock" id="stock" value="0" class="form-control">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="name">Deskripsi</label>
                        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="name">Upload Foto Produk</label>
                        <input class="form-control" type="file" name="image" id="formFile">
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
