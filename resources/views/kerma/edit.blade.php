<x-layouts>
    <form id="edit-form" action="/kerma/{{ $kerma->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Gunakan method PUT untuk update -->
        <div class="container-fluid mt-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Edit Kerjasama</h5>
                    <button type="submit" class="btn btn-success btn-sm" id="btn-update">
                        <i class="bx bx-save"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>

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
                                                    {{ $kerma->status_kerma_id == $status->id ? 'selected' : '' }}>
                                                    {{ $status->status }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('status_kerma_id')
                                            <small class="text-danger">{{ $message }}</small>
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
                                                id="tanggal_awal" name="tanggal_awal"
                                                value="{{ $kerma->tanggal_awal }}">
                                        </div>
                                        @error('tanggal_awal')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal_akhir" class="form-label">Tanggal Berakhir</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="tanggalBerakhir-addon">
                                                <i class="bi bi-calendar-date" style="color: inherit;"></i>
                                            </span>
                                            <input type="date" class="form-control" id="tanggal_akhir"
                                                name="tanggal_akhir" value="{{ $kerma->tanggal_akhir }}">
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
                                        <small class="text-muted d-block mb-2">Kosongkan jika tidak ingin mengubah
                                            dokumen.</small>
                                        @if ($kerma->dokumen)
                                            <embed id="pdfPreview" src="{{ asset('storage/' . $kerma->dokumen) }}"
                                                type="application/pdf" width="100%" height="400px"
                                                style="border: 1px solid #ddd;" />
                                        @else
                                            <embed id="pdfPreview" src="" type="application/pdf" width="100%"
                                                height="400px" style="display:none; border: 1px solid #ddd;" />
                                        @endif
                                    </div>
                                    @error('dokumen')
                                        <small class="text-danger">{{ $message }}</small>
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
                                            {{ $kerma->jenis_kerma_id == $jenis->id ? 'selected' : '' }}>
                                            {{ $jenis->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jenis_kerma_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nomorDokumen" class="form-label">Nomor Dokumen</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="nomorDokumen-addon">
                                        <i class="bi bi-hash" style="color: inherit;"></i>
                                    </span>
                                    <input type="text" class="form-control" id="nomorDokumen"
                                        name="nomor_dokumen" value="{{ $kerma->nomor_dokumen }}">
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
                                        value="{{ $kerma->judul }}">
                                </div>
                                @error('judul')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <small class="text-muted d-block mb-2">Ringkasan singkat terkait cakupan atau kegiatan
                                    kerja sama</small>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ $kerma->deskripsi }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="anggaran" class="form-label">Anggaran</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="anggaran-addon">
                                        <i class="bi bi-cash" style="color: inherit;"></i>
                                    </span>
                                    <input type="text" class="form-control @error('anggaran') is-invalid @enderror"
                                        id="anggaran" name="anggaran" placeholder="Biaya"
                                        value="{{ $kerma->anggaran }}">
                                </div>
                                @error('anggaran')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="sumber_pendanaan" class="form-label">Sumber Pendanaan</label>
                                <select class="form-select select2" id="sumber_pendanaan" name="sumber_pendanaan_id"
                                    data-placeholder="Pilih sumber pendanaan">
                                    <option></option>
                                    @foreach ($sumber_pendanaans as $sumber)
                                        <option value="{{ $sumber->id }}"
                                            {{ $kerma->sumber_pendanaan_id == $sumber->id ? 'selected' : '' }}>
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

        <div class="container-fluid mt-3">
            <div class="row">
                <!-- Container for Penggiat Kerjasama -->
                <div class="col-md-6">
                    <div class="card">
                        <h5 class="card-header bg-light">
                            <i class="bi bi-people"></i> PENGGIAT KERJASAMA
                        </h5>
                        <div class="card-body">
                            <!-- Card untuk Form Penggiat -->
                            <div id="penggiatContainer">
                                @foreach ($penggiat_kermas as $index => $penggiat)
                                    <div class="card mb-3 penggiat-card" data-index="{{ $index }}">
                                        <div
                                            class="card-header bg-light d-flex justify-content-between align-items-center pihakAllToggle">
                                            <div>
                                                <i class="bi bi-geo-alt"></i> Pihak #{{ $index + 1 }}
                                                <i class="bi bi-chevron-up" style="cursor: pointer;"></i>
                                            </div>
                                            @if ($index >= 2)
                                                <!-- Tombol hapus hanya muncul untuk penggiat yang di-clone -->
                                                <button type="button"
                                                    class="btn btn-danger btn-sm delete-penggiat"><i
                                                        class="bi bi-trash"></i></button>
                                            @endif
                                        </div>
                                        <div class="collapse show pihakAllCollapse">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="namaInstansi" class="form-label">Nama Unit</label>
                                                    <div class="d-flex align-items-center">
                                                        <select class="form-select select2 me-2"
                                                            name="penggiat[{{ $index }}][mitra_id]"
                                                            data-placeholder="Pilih Nama Unit"
                                                            @if ($index == 0 && auth()->user()->role !== 'admin') disabled @endif>

                                                            <option value=""></option>
                                                            @foreach ($mitras as $mitra)
                                                                <option value="{{ $mitra->id }}"
                                                                    @if ($mitra->id == $penggiat->mitra->id) selected @endif>
                                                                    {{ $mitra->nama_institusi }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        @if ($index == 0 && auth()->user()->role !== 'admin')
                                                            <!-- Input tersembunyi untuk mengirimkan ID instansi bagi user non-admin -->
                                                            <input type="hidden"
                                                                name="penggiat[{{ $index }}][mitra_id]"
                                                                value="{{ $penggiat->mitra->id }}">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <textarea class="form-control" name="penggiat[{{ $index }}][alamat]" rows="3">{{ $penggiat->alamat }}</textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Penandatangan</label>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="nama_penandatangan" class="form-label">Nama
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                name="penggiat[{{ $index }}][nama_penandatangan]"
                                                                value="{{ $penggiat->nama_penandatangan }}">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="jabatan_penandatangan"
                                                                class="form-label">Jabatan
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                name="penggiat[{{ $index }}][jabatan_penandatangan]"
                                                                value="{{ $penggiat->jabatan_penandatangan }}">
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
                                                                <label for="nama_penanggungjawab"
                                                                    class="form-label">Nama
                                                                    :</label>
                                                                <input type="text" class="form-control"
                                                                    name="penggiat[{{ $index }}][nama_penanggungjawab]"
                                                                    value="{{ $penggiat->nama_penanggungjawab }}">
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="jabatan_penanggungjawab"
                                                                    class="form-label">Jabatan :</label>
                                                                <input type="text" class="form-control"
                                                                    name="penggiat[{{ $index }}][jabatan_penanggungjawab]"
                                                                    value="{{ $penggiat->jabatan_penanggungjawab }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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
                                @foreach ($detail_kegiatans as $index => $detail)
                                    <div class="card mb-3 kegiatan-card" data-index="{{ $index }}">
                                        <div
                                            class="card-header bg-light d-flex justify-content-between align-items-center kegiatanAllToggle">
                                            <div>
                                                <i class="bi bi-geo-alt"></i> Kegiatan #{{ $index + 1 }}
                                                <i class="bi bi-chevron-up" style="cursor: pointer;"></i>
                                            </div>
                                            <button type="button" class="btn btn-danger btn-sm delete-kegiatan">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                        <div class="collapse show kegiatanAllCollapse">
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <label for="bentuk" class="form-label">Bentuk Kegiatan</label>
                                                    <select class="form-select select2"
                                                        name="detail_kegiatan[{{ $index }}][bentuk_kegiatan_id]"
                                                        data-placeholder="Pilih bentuk kegiatan">
                                                        <option></option>
                                                        @foreach ($bentuk_kegiatans as $bentuk)
                                                            <option value="{{ $bentuk->id }}"
                                                                {{ $detail->bentuk_kegiatan_id == $bentuk->id ? 'selected' : '' }}>
                                                                {{ $bentuk->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="nilaiKontrak" class="form-label">Nilai Kontrak</label>
                                                    <small class="text-muted d-block mb-2">Nominal nilai kontrak
                                                        proposal</small>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="bi bi-cash"></i>
                                                        </span>
                                                        <input type="text" class="form-control"
                                                            name="detail_kegiatan[{{ $index }}][nilai_kontrak]"
                                                            value="{{ $detail->nilai_kontrak }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="luaran" class="form-label">Luaran</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">Volume</span>
                                                        <input type="text" class="form-control"
                                                            name="detail_kegiatan[{{ $index }}][luaran]"
                                                            value="{{ $detail->luaran }}">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="keterangan" class="form-label">Keterangan</label>
                                                    <small class="text-muted d-block mb-2">Ringkasan luaran dari
                                                        kegiatan</small>
                                                    <textarea class="form-control" name="detail_kegiatan[{{ $index }}][keterangan]"
                                                        value="{{ $detail->keterangan }}" rows="3"></textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="sasaran" class="form-label">Sasaran</label>
                                                    <select class="form-select select2"
                                                        name="detail_kegiatan[{{ $index }}][sasaran_id]"
                                                        data-placeholder="Pilih sasaran program">
                                                        <option value="">Pilih Sasaran</option>
                                                        @foreach ($sasarans as $sasaran)
                                                            <option value="{{ $sasaran->id }}"
                                                                {{ $detail->sasaran_id == $sasaran->id ? 'selected' : '' }}>
                                                                {{ $sasaran->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="indikator" class="form-label">Indikator
                                                        Kinerja</label>
                                                    <select class="form-select select2"
                                                        name="detail_kegiatan[{{ $index }}][indikator_id]"
                                                        data-placeholder="Pilih indikator kerja">
                                                        <option value="">Pilih Indikator</option>
                                                        @foreach ($indikators as $indikator)
                                                            <option value="{{ $indikator->id }}"
                                                                {{ $detail->indikator_id == $indikator->id ? 'selected' : '' }}>
                                                                {{ $indikator->indikator }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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
                placeholder: $(this).data('placeholder') || "Pilih opsi"
            });
        }

        toggleCollapse('.pihakAllToggle', '.pihakAllCollapse');
        toggleCollapse('.kegiatanAllToggle', '.kegiatanAllCollapse');

        let penggiatIndex =
            {{ count($penggiat_kermas) }}; // Mulai dari index 2 (karena pihak 1 dan 2 sudah ada)

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
                                <select class="form-select select2 me-2" name="penggiat[${penggiatIndex}][mitra_id]" data-placeholder="Pilih Nama Unit">
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

        let kegiatanIndex = {{ count($detail_kegiatans) }};; // Mulai dari index 0

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

        $(document).on('click', '#btn-update', function(e) {
            e.preventDefault();

            // SweetAlert2 dialog konfirmasi
            Swal.fire({
                title: "Apakah Anda ingin menyimpan perubahan?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Simpan",
                denyButtonText: "Jangan simpan"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim form menggunakan AJAX
                    $.ajax({
                        url: $('#edit-form').attr(
                        'action'), // Ambil URL dari action form
                        method: 'POST',
                        data: new FormData($('#edit-form')[
                        0]), // Mengambil data dari form
                        processData: false, // Jangan olah data
                        contentType: false, // Kirim dengan tipe konten default
                        success: function(response) {
                            // Tampilkan alert sukses
                            Swal.fire({
                                title: "Disimpan!",
                                text: "Data Anda telah berhasil diperbarui.",
                                icon: "success"
                            }).then(() => {
                                window.location.href =
                                '/kerma'; // Alihkan setelah sukses
                            });
                        },
                        error: function(xhr) {
                            // Menangani kesalahan
                            let errorMessage = xhr.responseJSON.message ||
                                'Gagal memperbarui data. Silakan coba lagi.';
                            Swal.fire({
                                title: "Gagal!",
                                text: errorMessage,
                                icon: "error"
                            });
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire("Perubahan tidak disimpan", "", "info");
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
