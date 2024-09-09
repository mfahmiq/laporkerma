<div class="modal fade" id="myModalCreate" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="myModalLabel">Tambah Mitra</h5>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/mitra" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="klasifikasi" class="form-label">Klasifikasi Mitra</label>
<<<<<<< HEAD
                        <select class="form-select select2" id="klasifikasi" name="klasifikasi_mitra_id"
                            data-placeholder="Pilih Klasifikasi Mitra">
                            <option></option>
                            @foreach ($klasifikasi_mitras as $klasifikasi)
                                <option value="{{ $klasifikasi->id }}">{{ $klasifikasi->name }}</option>
                            @endforeach
=======
                        <select class="form-select select2" id="klasifikasi" name="klasifikasi_id"
                            data-placeholder="Pilih Klasifikasi Mitra">
                            <option></option>
                            <option value="1">Pilihan 1</option>
>>>>>>> bd6d88dc7ef8172606f4d4bf0925e871c0d01483
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama_institusi" class="form-label">Nama Institusi</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-building"></i></span>
                            <input type="text" class="form-control" id="nama_institusi" name="nama_institusi"
                                placeholder="Nama Institusi">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
<<<<<<< HEAD
                        <label for="country" class="form-label">Negara</label>
                        <select class="form-select select2" name="country_id" data-placeholder="Pilih Negara">
                            <option></option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
=======
                        <label for="country_id" class="form-label">Negara</label>
                        <select class="form-select select2" id="country_id" name="country_id"
                            data-placeholder="Pilih Negara">
                            <option></option>
                            <option value="ID">Indonesia</option>
>>>>>>> bd6d88dc7ef8172606f4d4bf0925e871c0d01483
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="telp" class="form-label">Telp.</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                            <input type="text" class="form-control" id="telp" name="telp"
                                placeholder="Nomor Telepon">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-globe"></i></span>
                            <input type="text" class="form-control" id="website" name="website"
                                placeholder="Alamat Website">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm"><i class="bx bx-save"></i> Simpan</button>
                        <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
