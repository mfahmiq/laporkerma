<x-layouts>
    <div class="container-fluid mt-4" style="overflow: hidden;">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">Tabel Kerjasama</h5>
                <div class="d-flex align-items-center">
                    <!-- Tombol Filter -->
                    <a href="#" class="btn btn-info btn-sm me-2" id="filterButton">
                        <i class="bi bi-funnel"></i>
                    </a>
                    <!-- Tombol Download -->
                    <a href="#" class="btn btn-success btn-sm me-2">
                        <i class="bi bi-download"></i>
                    </a>
                    <!-- Tombol + Add -->
                    <a href="/kerma/create" class="btn btn-success btn-sm small">+ Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <!-- Filter Dropdowns (initially hidden) -->
                <div id="filterDropdowns" class="mb-3" style="display: none;">
                    <div class="row">
                        <div class="col-md-12 mb-2 d-flex align-items-center">
                            <!-- Jenis Dokumen Kerjasama Icon -->
                            <span class="input-group-text bg-transparent border-0"><i
                                    class="bi bi-file-earmark-text"></i></span>
                            <!-- Jenis Dokumen Kerjasama Select2 -->
                            <select class="form-select select2" id="jenisDokumen"
                                data-placeholder="Pilih Jenis Dokumen Kerjasama">
                                <option></option>
                                <option value="1">Jenis Dokumen 1</option>
                                <option value="2">Jenis Dokumen 2</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-2 d-flex align-items-center">
                            <!-- Sumber Pendanaan Icon -->
                            <span class="input-group-text bg-transparent border-0"><i class="bi bi-cash"></i></span>
                            <!-- Sumber Pendanaan Select2 -->
                            <select class="form-select select2" id="sumberPendanaan"
                                data-placeholder="Pilih Sumber Pendanaan">
                                <option></option>
                                <option value="1">Sumber 1</option>
                                <option value="2">Sumber 2</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-2 d-flex align-items-center">
                            <!-- Status Kerjasama Icon -->
                            <span class="input-group-text bg-transparent border-0"><i
                                    class="bi bi-check-circle"></i></span>
                            <!-- Status Kerjasama Select2 -->
                            <select class="form-select select2" id="statusKerjasama"
                                data-placeholder="Pilih Status Kerjasama">
                                <option></option>
                                <option value="1">Status 1</option>
                                <option value="2">Status 2</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-2 d-flex align-items-center">
                            <!-- Bentuk Kegiatan Icon -->
                            <span class="input-group-text bg-transparent border-0"><i
                                    class="bi bi-calendar-event"></i></span>
                            <!-- Bentuk Kegiatan Select2 -->
                            <select class="form-select select2" id="bentukKegiatan"
                                data-placeholder="Pilih Bentuk Kegiatan">
                                <option></option>
                                <option value="1">Bentuk 1</option>
                                <option value="2">Bentuk 2</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-2 d-flex align-items-center">
                            <!-- Tahun Icon -->
                            <span class="input-group-text bg-transparent border-0"><i class="bi bi-calendar"></i></span>
                            <!-- Tahun Select2 -->
                            <select class="form-select select2" id="tahun" data-placeholder="Pilih Tahun">
                                <option></option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-2 d-flex align-items-center">
                            <!-- Kondisi Tertentu Icon -->
                            <span class="input-group-text bg-transparent border-0"><i
                                    class="bi bi-exclamation-circle"></i></span>
                            <!-- Kondisi Tertentu Select2 -->
                            <select class="form-select select2" id="kondisiTertentu"
                                data-placeholder="Pilih Kondisi Tertentu">
                                <option></option>
                                <option value="1">Kondisi 1</option>
                                <option value="2">Kondisi 2</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-2 d-flex align-items-center">
                            <!-- Klasifikasi Mitra Icon -->
                            <span class="input-group-text bg-transparent border-0"><i class="bi bi-list"></i></span>
                            <!-- Klasifikasi Mitra Select2 -->
                            <select class="form-select select2" id="klasifikasiMitra"
                                data-placeholder="Pilih Klasifikasi Mitra">
                                <option></option>
                                <option value="1">Klasifikasi 1</option>
                                <option value="2">Klasifikasi 2</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-2 d-flex align-items-center">
                            <!-- Negara Icon -->
                            <span class="input-group-text bg-transparent border-0"><i class="bi bi-flag"></i></span>
                            <!-- Negara Select2 -->
                            <select class="form-select select2" id="negara" data-placeholder="Pilih Negara">
                                <option></option>
                                <option value="ID">Indonesia</option>
                                <option value="US">Amerika Serikat</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="small text-center" style="width: 20px;">No</th>
                                <th class="small text-center" style="width: 150px;">Judul</th>
                                <th class="small text-center" style="width: 150px;">Instansi</th>
                                <th class="small text-center" style="width: 50px;">Status</th>
                                <th class="small text-center" style="width: 100px;">Masa Berlaku</th>
                                <th class="small text-center" style="width: 100px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="small text-center">1</td>
                                <td class="small">Judul Contoh</td>
                                <td class="small">Instansi Contoh</td>
                                <td class="small">Aktif</td>
                                <td class="small">2024-12-31</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-primary btn-sm me-2">
                                        <i class="bx bx-detail"></i>
                                    </a>
                                    <a href="{{ url('kermaEdit') }}" class="btn btn-sm btn-warning me-2">
                                        <i class="bi bi-pencil-fill small"></i>
                                    </a>                                    
                                    <a href="#" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash-fill small"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Select2 CSS -->

    <!-- jQuery and Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Custom Script for Select2 Initialization -->
    <script>
        $(document).ready(function() {
            // Initialize Select2 for the filter dropdowns
            $('#jenisDokumen').select2({
                width: 'resolve',
                dropdownParent: $('#jenisDokumen').parent()
            });
            $('#sumberPendanaan').select2({
                width: 'resolve',
                dropdownParent: $('#sumberPendanaan').parent()
            });
            $('#statusKerjasama').select2({
                width: 'resolve',
                dropdownParent: $('#statusKerjasama').parent()
            });
            $('#bentukKegiatan').select2({
                width: 'resolve',
                dropdownParent: $('#bentukKegiatan').parent()
            });
            $('#tahun').select2({
                width: 'resolve',
                dropdownParent: $('#tahun').parent()
            });
            $('#kondisiTertentu').select2({
                width: 'resolve',
                dropdownParent: $('#kondisiTertentu').parent()
            });
            $('#klasifikasiMitra').select2({
                width: 'resolve',
                dropdownParent: $('#klasifikasiMitra').parent()
            });
            $('#negara').select2({
                width: 'resolve',
                dropdownParent: $('#negara').parent()
            });

            // Toggle filter dropdowns visibility
            $('#filterButton').on('click', function(e) {
                e.preventDefault();
                $('#filterDropdowns').toggle();
            });
        });
    </script>
</x-layouts>
