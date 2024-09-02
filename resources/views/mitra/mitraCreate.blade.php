<div class="modal fade" id="myModalCreate" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="myModalLabel">Tambah Mitra</h5>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="klasifikasi" class="form-label">Klasifikasi Mitra</label>
                        <select class="form-select select2" id="klasifikasi" data-placeholder="Pilih Klasifikasi Mitra">
                            <option></option>
                            <option value="1">Pilihan 1</option>
                            <option value="2">Pilihan 2</option>
                            <option value="3">Pilihan 3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama_institusi" class="form-label">Nama Institusi</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-building"></i></span>
                            <input type="text" class="form-control" id="nama_institusi" placeholder="Nama Institusi">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="negara" class="form-label">Negara</label>
                        <select class="form-select select2" id="negara" data-placeholder="Pilih Negara">
                            <option></option>
                            <option value="ID">Indonesia</option>
                            <option value="US">Amerika Serikat</option>
                            <option value="AU">Australia</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="telp" class="form-label">Telp.</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                            <input type="text" class="form-control" id="telp" placeholder="Nomor Telepon">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-globe"></i></span>
                            <input type="text" class="form-control" id="website" placeholder="Alamat Website">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-sm"><i class="bx bx-save"></i> Simpan</button>
                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
