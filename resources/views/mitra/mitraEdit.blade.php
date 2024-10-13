<div class="modal fade" id="myModalEdit" tabindex="-1" aria-labelledby="myModalLabelEdit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabelEdit">Edit Mitra</h5>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="klasifikasiEdit" class="form-label">Klasifikasi Mitra</label>
                        <select class="form-select select2" id="klasifikasiEdit" name="klasifikasi_mitra_id"
                            data-placeholder="Pilih Klasifikasi Mitra">
                            <option></option>
                            @foreach ($klasifikasi_mitras as $klasifikasi)
                                <option value="{{ $klasifikasi->id }}">{{ $klasifikasi->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama_institusiEdit" class="form-label">Nama Institusi</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-building"></i></span>
                            <input type="text" class="form-control" id="nama_institusiEdit" name="nama_institusi"
                                placeholder="Nama Institusi">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="alamatEdit" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamatEdit" name="alamat" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="countryEdit" class="form-label">Negara</label>
                        <select class="form-select select2" id="countryEdit" name="country_id" data-placeholder="Pilih Negara">
                            <option></option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="telpEdit" class="form-label">Telp.</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                            <input type="text" class="form-control" id="telpEdit" name="telp"
                                placeholder="Nomor Telepon">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="websiteEdit" class="form-label">Website</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-globe"></i></span>
                            <input type="text" class="form-control" id="websiteEdit" name="website"
                                placeholder="Alamat Website">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm" id="btn-update"><i class="bx bx-save"></i> Simpan</button>
                        <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
