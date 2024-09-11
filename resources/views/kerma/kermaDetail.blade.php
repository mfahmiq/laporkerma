<style>
    .modal .form-label {
        font-weight: bold;
    }
    .card-header {
        display: flex;
        align-items: center;
    }
    .card-header i {
        font-size: 14px;
        
    }
    .card-header h5 {
        margin: 0; /* Menghapus margin default */
    }
</style>

<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Informasi Kerjasama</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid" style="font-size: 14px;">
                    <!-- Masa Berlaku dan Dokumen -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-header">
                                        <i class="bi bi-calendar-check" style="margin-right: 15px"></i>
                                        <h5 class="mb-0">MASA BERLAKU</h5>
                                    </div>
                                    <br />
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status:</label>
                                        <p id="status">Isi status di sini</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal_awal" class="form-label">Tanggal Awal:</label>
                                        <p id="tanggal_awal">Isi tanggal awal di sini</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal_akhir" class="form-label">Tanggal Berakhir:</label>
                                        <p id="tanggal_akhir">Isi tanggal akhir di sini</p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card-header">
                                        <i class="bi bi-file-earmark-text" style="margin-right: 15px"></i>
                                        <h5 class="mb-0">DOKUMEN</h5>
                                    </div>
                                    <br />
                                    <div class="mb-3">
                                        <label for="jenisDokumen" class="form-label">File :</label>
                                        <p id="jenisDokumen"><a href="#" target="_blank"><i
                                                    class="bi bi-file-earmark-pdf fs-6 me-1"></i>PDF</a></p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenisDokumen" class="form-label">Jenis Dokumen Kerjasama:</label>
                                        <p id="jenisDokumen">Isi jenis dokumen di sini</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nomorDokumen" class="form-label">Nomor Dokumen:</label>
                                        <p id="nomorDokumen">Isi nomor dokumen di sini</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="judulKerjasama" class="form-label">Judul Kerjasama:</label>
                                        <p id="judulKerjasama">Isi judul kerjasama di sini</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi:</label>
                                        <p id="deskripsi">Isi deskripsi di sini</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="anggaran" class="form-label">Anggaran:</label>
                                        <p id="anggaran">Isi anggaran di sini</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sumber_pendanaan" class="form-label">Sumber Pendanaan:</label>
                                        <p id="sumber_pendanaan">Isi sumber pendanaan di sini</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bentuk Kegiatan dan Penggiat Kerjasama -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-header">
                                        <i class="bi bi-person-check" style="margin-right: 15px"></i>
                                        <h5 class="mb-0">PENGGIAT KERJASAMA</h5>
                                    </div>
                                    <br />
                                    <div id="penggiatContainer">
                                        <div class="mb-3">
                                            <label for="namaInstansi" class="form-label">Nama Instansi:</label>
                                            <p id="namaInstansi">Isi nama instansi di sini</p>
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat:</label>
                                            <p id="alamat">Isi alamat di sini</p>
                                        </div>
                                        <div class="mb-3">
                                            <label for="namaPenandatangan" class="form-label">Nama
                                                Penandatangan:</label>
                                            <p id="namaPenandatangan">Isi nama penandatangan di sini</p>
                                        </div>
                                        <div class="mb-3">
                                            <label for="jabatanPenandatangan" class="form-label">Jabatan
                                                Penandatangan:</label>
                                            <p id="jabatanPenandatangan">Isi jabatan penandatangan di sini</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Penanggung Jawab (jika ada):</label>
                                            <p id="penanggungJawab">Isi penanggung jawab di sini</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-header">
                                        <i class="bi bi-bar-chart" style="margin-right: 15px"></i>
                                        <h5 class="mb-0">BENTUK KEGIATAN</h5>
                                    </div>
                                    <br />
                                    <div id="formsContainer">
                                        <div class="mb-3 dynamic-form">
                                            <div class="mb-3">
                                                <label for="nilaiKontrak" class="form-label">Nama Kegiatan :</label>
                                                <p id="nilaiKontrak">Isi nama kegiatan di sini</p>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nilaiKontrak" class="form-label">Nilai Kontrak:</label>
                                                <p id="nilaiKontrak">Isi nilai kontrak di sini</p>
                                            </div>
                                            <div class="mb-3">
                                                <label for="luaran" class="form-label">Luaran:</label>
                                                <p id="luaran">Isi luaran di sini</p>
                                            </div>
                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label">Keterangan:</label>
                                                <p id="keterangan">Isi keterangan di sini</p>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sasaran" class="form-label">Sasaran:</label>
                                                <p id="sasaran">Isi sasaran di sini</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
