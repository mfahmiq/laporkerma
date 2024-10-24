<x-layouts>
    <form id="myForm" action="/kerma" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid mt-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Tambah Kerjasama</h5>
                    <button type="submit" class="btn btn-success btn-sm" id="btn-save">
                        <i class="bx bx-save"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
        {{-- Form Utama Kerja Sama --}}
        <div class="container-fluid mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row flex-wrap">
                        <div class="flex-fill me-3" style="min-width: 300px;">
                            <div class="card">
                                <div class="card-header">
                                    <i class="bi bi-calendar" style="color: inherit;"></i> MASA BERLAKU
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select
                                            class="form-select select2 @error('status_kerma_id') is-invalid @enderror"
                                            id="status" name="status_kerma_id" data-placeholder="Status Kerja Sama">
                                            <option></option>
                                            @foreach ($status_kermas as $status)
                                                <option value="{{ $status->id }}"
                                                    {{ old('status_kerma_id') == $status->id ? 'selected' : '' }}>
                                                    {{ $status->status }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('status_kerma_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="tanggalAwal-addon">
                                                <i class="bi bi-calendar-date" style="color: inherit;"></i>
                                            </span>
                                            <input type="date"
                                                class="form-control @error('tanggal_awal') is-invalid @enderror"
                                                id="tanggal_awal" name="tanggal_awal" value="{{ old('tanggal_awal') }}">
                                        </div>
                                        @error('tanggal_awal')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal_akhir" class="form-label">Tanggal Berakhir</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="tanggalBerakhir-addon">
                                                <i class="bi bi-calendar-date" style="color: inherit;"></i>
                                            </span>
                                            <input type="date" class="form-control" id="tanggal_akhir"
                                                name="tanggal_akhir" value="{{ old('tanggal_akhir') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <i class="bi bi-file-earmark" style="color: inherit;"></i> DOKUMEN
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="dokumen" class="form-label">Upload Dokumen</label>
                                        <input class="form-control @error('dokumen') is-invalid @enderror"
                                            type="file" id="dokumen" name="dokumen" accept="application/pdf"
                                            onchange="previewDocument()">
                                        <embed id="pdfPreview" src="" type="application/pdf" width="100%"
                                            height="400px" style="display:none; border: 1px solid #ddd;" />
                                    </div>
                                    @error('dokumen')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="flex-fill" style="min-width: 300px;">
                            <div class="mb-3">
                                <label for="jenisDokumen" class="form-label">Jenis Dokumen Kerjasama</label>
                                <select class="form-select select2 @error('jenis_kerma_id') is-invalid @enderror"
                                    id="jenisDokumen" name="jenis_kerma_id"
                                    data-placeholder="Pilih jenis dokumen kerjasama">
                                    <option></option>
                                    @foreach ($jenis_kermas as $jenis)
                                        <option value="{{ $jenis->id }}"
                                            {{ old('jenis_kerma_id') == $jenis->id ? 'selected' : '' }}>
                                            {{ $jenis->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jenis_kerma_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nomorDokumen" class="form-label">Nomor Dokumen</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="nomorDokumen-addon">
                                        <i class="bi bi-hash" style="color: inherit;"></i>
                                    </span>
                                    <input type="text" class="form-control" id="nomorDokumen" name="nomor_dokumen"
                                        value="{{ old('nomor_dokumen') }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="judulKerjasama" class="form-label">Judul Kerjasama</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="judulKerjasama-addon">
                                        <i class="bi bi-card-heading" style="color: inherit;"></i>
                                    </span>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                        id="judulKerjasama" name="judul" placeholder="Judul"
                                        value="{{ old('judul') }}">
                                </div>
                                @error('judul')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <small class="text-muted d-block mb-2">Ringkasan singkat terkait cakupan atau kegiatan
                                    kerja sama</small>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="anggaran" class="form-label">Anggaran</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="anggaran-addon">
                                        <i class="bi bi-cash" style="color: inherit;"></i>
                                    </span>
                                    <input type="text" class="form-control @error('anggaran') is-invalid @enderror"
                                        id="anggaran" name="anggaran" placeholder="Biaya"
                                        value="{{ old('anggaran') }}">
                                </div>
                                @error('anggaran')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="sumber_pendanaan" class="form-label">Sumber Pendanaan</label>
                                <select class="form-select select2" id="sumber_pendanaan" name="sumber_pendanaan_id"
                                    data-placeholder="Pilih sumber pendanaan">
                                    <option></option>
                                    @foreach ($sumber_pendanaans as $sumber)
                                        <option value="{{ $sumber->id }}"
                                            {{ old('sumber_pendanaan_id') == $sumber->id ? 'selected' : '' }}>
                                            {{ $sumber->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Section -->
        <div class="container-fluid mt-3">
            <div class="row">
                <!-- Container for Penggiat Kerjasama -->
                <div class="col-md-6">
                    <div class="card">
                        <h5 class="card-header bg-light">
                            <i class="bi bi-people"></i> PENGGIAT KERJASAMA
                        </h5>
                        <div class="card-body">
                            <!-- Card untuk Form Penggiat Statis -->
                            <div id="penggiatContainer">
                                <!-- Penggiat Form Pihak #1 -->
                                <div class="card mb-3 penggiat-card" data-index="0">
                                    <div
                                        class="card-header bg-light d-flex justify-content-between align-items-center pihakSatuToggle">
                                        <div>
                                            <i class="bi bi-geo-alt"></i> Pihak #1
                                            <i class="bi bi-chevron-up" style="cursor: pointer;"></i>
                                        </div>
                                    </div>
                                    <div class="collapse show pihakSatuCollapse">
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="namaInstansi" class="form-label">Nama Unit</label>
                                                <div class="d-flex align-items-center">
                                                    <select class="form-select select2 me-2"
                                                        name="penggiat[0][mitra_id]"
                                                        data-placeholder="Pilih Nama Unit"
                                                        {{ auth()->user()->role === 'admin' ? '' : 'disabled' }}>

                                                        <!-- Admin bisa melihat semua mitra -->
                                                        @if (auth()->user()->role === 'admin')
                                                            <option value=""></option>
                                                            @foreach ($mitras as $mitra)
                                                                <option value="{{ $mitra->id }}"
                                                                    {{ old('penggiat[0][mitra_id]') == $mitra->id ? 'selected' : '' }}>
                                                                    {{ $mitra->nama_institusi }}
                                                                </option>
                                                            @endforeach
                                                        @else
                                                            <!-- Pengguna biasa hanya bisa melihat instansinya sendiri -->
                                                            <option value="{{ auth()->user()->mitra->id }}" selected>
                                                                {{ auth()->user()->mitra->nama_institusi }}
                                                            </option>
                                                        @endif
                                                    </select>

                                                    <!-- Hanya tambahkan input hidden jika bukan admin -->
                                                    @if (auth()->user()->role !== 'admin')
                                                        <input type="hidden" name="penggiat[0][mitra_id]"
                                                            value="{{ auth()->user()->mitra->id }}">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <textarea class="form-control" name="penggiat[0][alamat]" rows="3">{{ old('penggiat.0.alamat') }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Penandatangan</label>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="nama_penandatangan" class="form-label">Nama
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                            name="penggiat[0][nama_penandatangan]"
                                                            value="{{ old('penggiat.0.nama_penandatangan') }}">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="jabatan_penandatangan" class="form-label">Jabatan
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                            name="penggiat[0][jabatan_penandatangan]"
                                                            value="{{ old('penggiat.0.jabatan_penandatangan') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label
                                                    class="form-label d-flex align-items-center penanggungJawabToggle"
                                                    role="button">
                                                    Penanggung Jawab (jika ada)
                                                    <i class="bi bi-chevron-down ms-2"></i>
                                                </label>
                                                <div class="collapse penanggungJawabCollapse">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="nama_penanggungjawab" class="form-label">Nama
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                name="penggiat[0][nama_penanggungjawab]">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="jabatan_penanggungjawab"
                                                                class="form-label">Jabatan :</label>
                                                            <input type="text" class="form-control"
                                                                name="penggiat[0][jabatan_penanggungjawab]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Penggiat Form Pihak #2 -->
                                <div class="card mb-3 penggiat-card" data-index="1">
                                    <div
                                        class="card-header bg-light d-flex justify-content-between align-items-center pihakDuaToggle">
                                        <div>
                                            <i class="bi bi-geo-alt"></i> Pihak #2
                                            <i class="bi bi-chevron-down" style="cursor: pointer;"></i>
                                        </div>
                                    </div>
                                    <div class="collapse pihakDuaCollapse">
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="namaInstansi" class="form-label">Nama Unit</label>
                                                <div class="d-flex align-items-center">
                                                    <select class="form-select select2 me-2"
                                                        name="penggiat[1][mitra_id]"
                                                        data-placeholder="Pilih Nama Unit" style="width: 80%;">
                                                        <option value=""></option>
                                                        @foreach ($mitras as $mitra)
                                                            <option value="{{ $mitra->id }}"
                                                                {{ old('penggiat.1.mitra_id') == $mitra->id ? 'selected' : '' }}>
                                                                {{ $mitra->nama_institusi }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    {{-- <button class="btn btn-success ms-1" data-bs-toggle="modal"
                                                        data-bs-target="#myModalCreate" type="button"><i
                                                            class="bi bi-plus"></i></button> --}}
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <textarea class="form-control" name="penggiat[1][alamat]" rows="3">{{ old('penggiat.1.alamat') }}</textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Penandatangan</label>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="nama_penandatangan" class="form-label">Nama
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                            name="penggiat[1][nama_penandatangan]"
                                                            value="{{ old('penggiat.1.nama_penandatangan') }}">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="jabatan_penandatangan" class="form-label">Jabatan
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                            name="penggiat[1][jabatan_penandatangan]"
                                                            value="{{ old('penggiat.1.jabatan_penandatangan') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label
                                                    class="form-label d-flex align-items-center penanggungJawabToggle"
                                                    role="button">
                                                    Penanggung Jawab (jika ada)
                                                    <i class="bi bi-chevron-down ms-2"></i>
                                                </label>
                                                <div class="collapse penanggungJawabCollapse">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="nama_penanggungjawab" class="form-label">Nama
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                name="penggiat[1][nama_penanggungjawab]">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="jabatan_penanggungjawab"
                                                                class="form-label">Jabatan :</label>
                                                            <input type="text" class="form-control"
                                                                name="penggiat[1][jabatan_penanggungjawab]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tombol Tambah Penggiat untuk Pihak #3 dan seterusnya -->
                        <div class="d-flex justify-content-end mt-3 px-3">
                            <button type="button" class="btn btn-success btn-sm" id="addPenggiatBtn">
                                <i class="bi bi-plus"></i> Tambah Penggiat
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Detail Kegiatan -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">
                                <i class="bi bi-list"></i> BENTUK KEGIATAN
                            </h5>
                        </div>
                        <div class="card-body">
                            <div id="kegiatanContainer">
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-3 px-3">
                            <button type="button" class="btn btn-success btn-sm" id="addKegiatanBtn">
                                <i class="bi bi-plus"></i> Tambah Kegiatan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @include('mitra.mitraCreate')
</x-layouts>

<script>
    $(document).ready(function() {
        // Fungsi untuk toggle collapse
        function toggleCollapse(triggerClass, collapseClass) {
            $(document).on('click', triggerClass, function() {
                $(this).next(collapseClass).collapse('toggle');

                // Ubah ikon
                const icon = $(this).find('i');
                icon.toggleClass('bi-chevron-down bi-chevron-up');
            });
        }

        // Fungsi untuk inisialisasi Select2
        function initializeSelect2() {
            $('.select2').select2({
                width: 'resolve', // menyesuaikan lebar
                placeholder: function() {
                    return $(this).data('placeholder');
                },
                allowClear: true
            });

            $('#myModalCreate .select2').select2({
                width: '100%',
                placeholder: function() {
                    return $(this).data('placeholder');
                },
                allowClear: true,
                dropdownParent: $('#myModalCreate')
            });
        }

        $(document).on('submit', '#addMitraForm', function(e) {
            e.preventDefault(); // Mencegah pengiriman form default

            // Mengambil data dari form untuk dikirim ke server
            var formData = $(this).serialize();

            // AJAX request untuk menambah mitra
            $.ajax({
                url: '/mitra', // URL untuk menambah mitra
                method: 'POST',
                data: formData,
                success: function(response) {
                    // Menambahkan data mitra ke select input di form utama
                    const newOption = new Option(response.nama_institusi, response.id,
                        false, true);
                    // Memastikan memilih option baru di dropdown
                    $('select[name^="penggiat"][name$="[mitra_id]"]').append(newOption)
                        .trigger('change');

                    // Menampilkan SweetAlert2 ketika berhasil menambah data
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Data mitra berhasil disimpan!",
                        showConfirmButton: false,
                        timer: 1500
                    });

                    // Reset form di dalam modal
                    $('#addMitraForm')[0].reset();
                    initializeSelect2(); // Reinitialize select2 untuk dropdown baru

                    // Modal tetap terbuka
                    $('#myModalCreate').modal('show'); // Menunjukkan modal kembali
                },
                error: function(xhr) {
                    // Menangani error dan menampilkan pesan
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = '';
                    $.each(errors, function(key, value) {
                        errorMessage += value[0] +
                            '\n'; // Menggabungkan pesan kesalahan
                    });
                    // Menggunakan SweetAlert untuk menampilkan pesan kesalahan
                    Swal.fire("Kesalahan!", errorMessage, "error");
                }
            });
        });


        // Toggle collapse for pihak 1 dan 2
        toggleCollapse('.pihakSatuToggle', '.pihakSatuCollapse');
        toggleCollapse('.pihakDuaToggle', '.pihakDuaCollapse');

        let penggiatIndex = 2; // Mulai dari index 2 (karena pihak 1 dan 2 sudah ada)

        // Tambah Penggiat
        $('#addPenggiatBtn').click(function() {
            let penggiatTemplate = `
            <div class="card mb-3 penggiat-card" data-index="${penggiatIndex}">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <div>
                        <i class="bi bi-geo-alt"></i> Pihak #${penggiatIndex + 1}
                        <i class="bi bi-chevron-up pihakMoreToggle" style="cursor: pointer;"></i>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm delete-penggiat">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
                <div class="collapse show pihakMoreCollapse">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="namaInstansi" class="form-label">Nama Unit</label>
                            <div class="d-flex align-items-center">
                                <select class="form-select select2 me-2" name="penggiat[${penggiatIndex}][mitra_id]" data-placeholder="Pilih Nama Unit" style="width: 80%;">
                                    <option value=""></option>
                                    @foreach ($mitras as $mitra)
                                        <option value="{{ $mitra->id }}"
                                            {{ old('penggiat.${penggiatIndex}.mitra_id') == $mitra->id ? 'selected' : '' }}>
                                            {{ $mitra->nama_institusi }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" name="penggiat[${penggiatIndex}][alamat]" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Penandatangan</label>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nama_penandatangan" class="form-label">Nama:</label>
                                        <input type="text" class="form-control" name="penggiat[${penggiatIndex}][nama_penandatangan]">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="jabatan_penandatangan" class="form-label">Jabatan:</label>
                                        <input type="text" class="form-control" name="penggiat[${penggiatIndex}][jabatan_penandatangan]">
                                    </div>
                                </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label d-flex align-items-center penanggungJawabToggle" role="button">
                                Penanggung Jawab (jika ada) <i class="bi bi-chevron-down ms-2"></i>
                            </label>
                            <div class="collapse penanggungJawabCollapse">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nama_penanggungjawab" class="form-label">Nama :</label>
                                        <input type="text" class="form-control" name="penggiat[${penggiatIndex}][nama_penanggungjawab]">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="jabatan_penanggungjawab" class="form-label">Jabatan :</label>
                                        <input type="text" class="form-control" name="penggiat[${penggiatIndex}][jabatan_penanggungjawab]">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;

            $('#penggiatContainer').append(penggiatTemplate);
            penggiatIndex++;

            // Reinitialize select2 untuk elemen baru
            initializeSelect2();
        });

        // Hapus Penggiat
        $(document).on('click', '.delete-penggiat', function() {
            $(this).closest('.penggiat-card').remove();
        });

        // Toggle collapse untuk Penanggung Jawab
        toggleCollapse('.penanggungJawabToggle', '.penanggungJawabCollapse');

        // Toggle collapse untuk Penggiat
        $(document).on('click', '.pihakMoreToggle', function() {
            $(this).closest('.penggiat-card').find('.pihakMoreCollapse').collapse('toggle');
            const icon = $(this);
            icon.toggleClass('bi-chevron-down bi-chevron-up');
        });

        let kegiatanIndex = 0; // Mulai dari index 0

        // Tambah Kegiatan
        $('#addKegiatanBtn').click(function() {
            let kegiatanTemplate = `
            <div class="card mb-3 kegiatan-card" data-index="${kegiatanIndex}">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <div>
                        <i class="bi bi-geo-alt"></i> Kegiatan #${kegiatanIndex + 1}
                        <i class="bi bi-chevron-down kegiatanMoreToggle" style="cursor: pointer;"></i>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm delete-kegiatan">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
                <div class="collapse show kegiatanMoreCollapse">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="bentuk" class="form-label">Bentuk Kegiatan</label>
                            <select class="form-select select2" name="detail_kegiatan[${kegiatanIndex}][bentuk_kegiatan_id]" data-placeholder="Pilih bentuk kegiatan">
                                <option></option>
                                @foreach ($bentuk_kegiatans as $bentuk)
                                    <option value="{{ $bentuk->id }}">{{ $bentuk->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nilaiKontrak" class="form-label">Nilai Kontrak</label>
                            <small class="text-muted d-block mb-2">Nominal nilai kontrak proposal</small>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-cash"></i>
                                </span>
                                <input type="text" class="form-control" name="detail_kegiatan[${kegiatanIndex}][nilai_kontrak]">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="luaran" class="form-label">Luaran</label>
                            <div class="input-group">
                                <span class="input-group-text">Volume</span>
                                <input type="text" class="form-control" name="detail_kegiatan[${kegiatanIndex}][luaran]">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <small class="text-muted d-block mb-2">Ringkasan luaran dari kegiatan</small>
                            <textarea class="form-control" name="detail_kegiatan[${kegiatanIndex}][keterangan]" rows="3"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="sasaran" class="form-label">Sasaran</label>
                            <select class="form-select select2" name="detail_kegiatan[${kegiatanIndex}][sasaran_id]" data-placeholder="Pilih sasaran program">
                                <option value="">Pilih Sasaran</option>
                                @foreach ($sasarans as $sasaran)
                                    <option value="{{ $sasaran->id }}">{{ $sasaran->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="indikator" class="form-label">Indikator Kinerja</label>
                            <select class="form-select select2" name="detail_kegiatan[${kegiatanIndex}][indikator_id]" data-placeholder="Pilih indikator kerja">
                                <option value="">Pilih Indikator</option>
                                @foreach ($indikators as $indikator)
                                    <option value="{{ $indikator->id }}">{{ $indikator->indikator }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>`;

            $('#kegiatanContainer').append(kegiatanTemplate);
            kegiatanIndex++;

            // Reinitialize select2 untuk elemen baru
            initializeSelect2();
        });

        // Hapus Kegiatan
        $(document).on('click', '.delete-kegiatan', function() {
            $(this).closest('.kegiatan-card').remove();
        });

        // Toggle collapse untuk Kegiatan
        $(document).on('click', '.kegiatanMoreToggle', function() {
            $(this).closest('.kegiatan-card').find('.kegiatanMoreCollapse').collapse('toggle');
            const icon = $(this);
            icon.toggleClass('bi-chevron-down bi-chevron-up');
        });

        // Inisialisasi Select2 untuk elemen yang sudah ada saat halaman siap
        initializeSelect2();

        $(document).on('click', '#btn-save', function(e) {
            e.preventDefault();

            // Kirim form menggunakan AJAX
            $.ajax({
                url: $('#myForm').attr('action'), // Ambil URL dari action form
                method: 'POST',
                data: new FormData($('#myForm')[0]), // Mengambil data dari form
                processData: false, // Jangan olah data
                contentType: false, // Kirim dengan tipe konten default
                success: function(response) {
                    // Tampilkan alert sukses
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Data Anda telah berhasil disimpan",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = '/kerma'; // Alihkan setelah sukses
                    });
                },
                error: function(xhr) {
                    // Menangani kesalahan
                    let errorMessage = xhr.responseJSON.message ||
                        'Gagal menambahkan data. Silakan coba lagi.';
                    Swal.fire({
                        title: "Gagal!",
                        text: errorMessage,
                        icon: "error"
                    });
                }
            });
        });
    });

    // Preview PDF
    function previewDocument() {
        const input = document.getElementById('dokumen');
        const file = input.files[0];
        const preview = document.getElementById('pdfPreview');

        if (file && file.type === 'application/pdf') {
            const fileURL = URL.createObjectURL(file);
            preview.src = fileURL;
            preview.style.display = 'block';
        } else {
            preview.style.display = 'none';
            preview.src = '';
            alert('File harus berupa PDF!');
        }
    }
</script>
