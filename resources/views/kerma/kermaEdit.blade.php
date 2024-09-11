<x-layouts>
    <div class="container-fluid mt-4" style="font-size: 14px;">
        <!-- Container Pertama -->
        <div class="card">
            <div class="card-body">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Form Kerjasama</h5>
                    <a class="btn btn-success btn-sm small"> <i class="bx bx-save"></i> Simpan</a>
                </div>
            </div>
            <br>
            <div class="d-flex flex-row flex-wrap">
                <div class="flex-fill me-3" style="min-width: 300px;">
                    <div class="mb-4">
                        <!-- Card Masa Berlaku -->
                        <div class="card">
                            <div class="card-header">
                                <i class="bi bi-calendar"></i> MASA BERLAKU
                            </div>
                            <div class="card-body">
                                <!-- Form Input untuk Masa Berlaku -->
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select select2" id="status" name="status_mitra_id"
                                        data-placeholder="Status Kerja Sama">
                                        <option></option>
                                        @foreach ($status_kermas as $status)
                                            <option value="{{ $status->id }}">{{ $status->status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="tanggalAwal-addon"><i
                                                class="bi bi-calendar-date"></i></span>
                                        <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal"
                                            aria-describedby="tanggalAwal-addon">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_akhir" class="form-label">Tanggal Berakhir</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="tanggalBerakhir-addon"><i
                                                class="bi bi-calendar-date"></i></span>
                                        <input type="date" class="form-control" id="tanggal_akhir"
                                            name="tanggal_akhir" aria-describedby="tanggalBerakhir-addon">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card Dokumen -->
                        <div class="card mt-4">
                            <div class="card-header">
                                <i class="bi bi-file-earmark"></i> DOKUMEN
                            </div>
                            <div class="card-body">
                                <form action="/your/upload/endpoint" class="dropzone" id="my-dropzone">
                                    <div class="dz-message">
                                        <i class="bi bi-cloud-upload-fill" style="font-size: 2rem;"></i><br>
                                        Drag & Drop atau Klik area ini untuk upload
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-fill ms-3" style="min-width: 300px;">
                    <!-- Form Input untuk Jenis Dokumen Kerjasama -->
                    <div class="mb-3">
                        <label for="jenisDokumen" class="form-label">Jenis Dokumen Kerjasama</label>
                        <select class="form-select select2" id="jenisDokumen" name="jenis_kerma_id"
                            data-placeholder="Pilih jenis dokumen kerjasama">
                            <option></option>
                            @foreach ($jenis_kermas as $jenis)
                                <option value="{{ $jenis->id }}">{{ $jenis->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nomorDokumen" class="form-label">Nomor Dokumen</label>
                        <div class="input-group">
                            <span class="input-group-text" id="nomorDokumen-addon"><i class="bi bi-hash"></i></span>
                            <input type="text" class="form-control" id="nomorDokumen"
                                aria-describedby="nomorDokumen-addon">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="judulKerjasama" class="form-label">Judul Kerjasama</label>
                        <div class="input-group">
                            <span class="input-group-text" id="judulKerjasama-addon"><i
                                    class="bi bi-card-heading"></i></span>
                            <input type="text" class="form-control" id="judulKerjasama"
                                aria-describedby="judulKerjasama-addon" placeholder="Judul">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <small class="text-muted d-block mb-2">Ringkasan singkat terkait cakupan atau kegiatan kerja
                            sama</small>
                        <textarea class="form-control" id="deskripsi" rows="4"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="anggaran" class="form-label">Anggaran</label>
                        <div class="input-group">
                            <span class="input-group-text" id="nomorDokumen-addon"><i
                                    class="bi bi-card-heading"></i></span>
                            <input type="text" class="form-control" id="anggaran" name="anggaran"
                                aria-describedby="anggaran-addon" placeholder="Biaya">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="sumber_pendanaan" class="form-label">Sumber Pendanaan</label>
                        <select class="form-select select2" id="sumber_pendanaan" name="sumber_pendanaan_id"
                            data-placeholder="Pilih sumber pendanaan">
                            <option></option>
                            @foreach ($sumber_pendanaans as $sumber)
                                <option value="{{ $sumber->id }}">{{ $sumber->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Container Wrapper untuk Container Kedua dan Ketiga -->
    <div class="container-fluid mt-4">
        <div class="d-flex flex-row">
            <!-- Container Kedua -->
            <div class="container-fluid flex-fill" style="overflow: hidden;">
                <div class="card">
                    <h5 class="card-header bg-light">
                        <i class="bi bi-people"></i> PENGGIAT KERJASAMA
                    </h5>
                    <div class="card-body">
                        <!-- Card untuk Form -->
                        <div id="penggiatContainer">
                            <!-- Penggiat Form akan di-generate di sini -->
                            <div class="card mb-3 penggiat-card">
                                <div class="card-header bg-light">
                                    <i class="bi bi-geo-alt"></i> Pihak # 1
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="namaInstansi" class="form-label">Nama Instansi</label>
                                            <div class="d-flex align-items-center">
                                                <select class="form-select me-2" id="namaInstansi" style="width: 30%; max-width: 300px;">
                                                    <option selected>Mitra</option>
                                                    <option>Perguruan Tinggi</option>
                                                </select>
                                                
                                                <select class="form-select select2 me-2" id="cariLembaga"
                                                    data-placeholder="Pilih Nama Instansi" style="width: 80%;">
                                                    <option value="">Pilih Instansi</option>
                                                    <option value="2">Lembaga 2</option>
                                                    <option value="3">Lembaga 3</option>
                                                </select>
                                                <button class="btn btn-success ms-2" data-bs-toggle="modal"
                                                    data-bs-target="#myModalCreate" type="button"><i
                                                        class="bi bi-plus"></i></button>
                                            </div>
                                        </div>

                                        <!-- Include Modal -->
                                        @include('mitra.mitraCreate')

                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <textarea class="form-control" id="alamat" rows="3"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Penandatangan</label>
                                            <small class="text-muted d-block mb-2">Pejabat yang menandatangani
                                                dokumen</small>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="namaPenandatangan" class="form-label">Nama :</label>
                                                    <input type="text" class="form-control"
                                                        id="namaPenandatangan">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="jabatanPenandatangan" class="form-label">Jabatan
                                                        :</label>
                                                    <input type="text" class="form-control"
                                                        id="jabatanPenandatangan">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label d-flex align-items-center penanggungJawabToggle"
                                                role="button">
                                                Penanggung Jawab (jika ada)
                                                <i class="bi bi-chevron-down ms-2"></i>
                                            </label>
                                            <div class="collapse penanggungJawabCollapse">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="namaPenanggungJawab" class="form-label">Nama
                                                            :</label>
                                                        <input type="text"
                                                            class="form-control namaPenanggungJawab">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="jabatanPenanggungJawab" class="form-label">Jabatan
                                                            :</label>
                                                        <input type="text"
                                                            class="form-control jabatanPenanggungJawab">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Tombol Tambah Penggiat di luar form tetapi di dalam card -->
                        <div class="d-flex justify-content-end mt-3 px-3">
                            <button type="button" class="btn btn-success btn-sm" id="addPenggiatBtn">
                                <i class="bi bi-plus"></i> Tambah Penggiat
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Container ke 3 -->
            <div class="container-fluid flex-fill">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-list"></i> BENTUK KEGIATAN
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <select class="form-select" id="bentukKegiatan" name="bentuk_kegiatan_id"
                                data-placeholder="Pilih bentuk kegiatan">
                                <option></option>
                                @foreach ($bentuk_kegiatans as $bentuk)
                                    <option value="{{ $bentuk->id }}">{{ $bentuk->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Container for dynamic forms -->
                        <div id="formsContainer"></div>

                        <template id="formTemplate">
                            <div class="card mb-3 dynamic-form">
                                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                    <span>
                                        <i class="bi bi-geo-alt"></i> <span class="form-title"></span>
                                    </span>
                                    <button type="button" class="btn btn-danger btn-sm delete-btn">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label for="nilaiKontrak" class="form-label">Nilai kontrak</label>
                                        <small class="text-muted d-block mb-2">Nominal nilai kontrak proposal</small>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="bi bi-cash"></i>
                                            </span>
                                            <input type="text" class="form-control" id="nilaiKontrak">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="luaran" class="form-label">Luaran</label>
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="input-group">
                                                    <span class="input-group-text">Volume</span>
                                                    <input type="text" class="form-control" id="luaran-at">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <span class="input-group-text">@</span>
                                                    <input type="text" class="form-control" id="luaran-at">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <small class="text-muted d-block mb-2">Ringkasan luaran dari kegiatan</small>
                                        <textarea class="form-control" id="keterangan" rows="3"></textarea>
                                    </div>
                                    <div class="dropdown-wrapper" style="max-width: 500px;">
                                        <div class="form-group mb-3">
                                            <label for="sasaran" class="form-label">Sasaran</label>
                                            <select class="form-select select2-sasaran" id="sasaran"
                                                name="sasaran_id" data-placeholder="Pilih sasaran program">
                                                <option value="">Pilih Sasaran</option>
                                                @foreach ($sasarans as $sasaran)
                                                    <option value="{{ $sasaran->id }}">{{ $sasaran->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group mb-3">
                                        <label for="indikator" class="form-label">Indikator Kinerja</label>
                                        <select class="form-select select2-indikator" id="indikator"
                                            name="indikator_id" data-placeholder="Pilih indikator kerja">
                                            <option value="">Pilih Indikator</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts>


<!-- Scripts -->
<script>
    $(document).ready(function() {
        // Fungsi untuk menginisialisasi Select2 pada elemen
        function initializeSelect2(container = document) {
            $(container).find('.select2').each(function() {
                if (!$(this).hasClass('select2-hidden-accessible')) {
                    $(this).select2({
                        dropdownParent: $(this).parent(),
                        width: '100%'
                    }).on('select2:open', function() {
                        $('body').addClass('no-horizontal-scroll');
                    }).on('select2:close', function() {
                        $('body').removeClass('no-horizontal-scroll');
                    });
                }
            });
        }


        // Fungsi untuk menginisialisasi collapse functionality
        function initializeCollapse(container) {
            $(container).find('.penanggungJawabToggle').each(function() {
                var content = $(this).next('.penanggungJawabCollapse');
                new bootstrap.Collapse(content[0], {
                    toggle: false
                });
                $(this).on('click', function() {
                    bootstrap.Collapse.getOrCreateInstance(content[0]).toggle();
                });
            });
        }

        // Event listener untuk #namaInstansi pada form yang sudah ada
        $(document).on('change', '#namaInstansi', function() {
            var formAktif = $(this).closest('.penggiat-card');
            var selectedInstansi = $(this).val();

            // Lakukan request Ajax berdasarkan instansi yang dipilih
            $.ajax({
                url: '/get-lembaga/' + selectedInstansi,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var cariLembaga = formAktif.find('#cariLembaga');
                    cariLembaga.empty();
                    $.each(data, function(key, value) {
                        cariLembaga.append('<option value="' + value.id + '">' +
                            value.nama_institusi + '</option>');
                    });
                    // Menjaga Select2 agar tetap diinisialisasi
                    initializeSelect2(formAktif);
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });

            // Sembunyikan tombol "+" jika Perguruan Tinggi dipilih
            if (selectedInstansi === 'Perguruan Tinggi') {
                formAktif.find('button[data-bs-target="#myModalCreate"]').hide();
            } else {
                formAktif.find('button[data-bs-target="#myModalCreate"]').show();
            }
        });

        // Event listener untuk cloning card Penggiat
        $('#addPenggiatBtn').on('click', function() {
            var originalCard = $('.penggiat-card').first();
            var clone = originalCard.clone();
            var cardNumber = $('.penggiat-card').length + 1;

            // Buat ID unik untuk setiap cloning
            clone.find('#namaInstansi').attr('id', 'namaInstansi' + cardNumber);
            clone.find('#cariLembaga').attr('id', 'cariLembaga' + cardNumber);

            // Bersihkan value dari form input, select, dan textarea pada elemen yang di-clone
            clone.find('input, select, textarea').val(''); // Reset nilai

            // Ubah judul header card sesuai dengan nomor card
            clone.find('.card-header').html('<i class="bi bi-geo-alt"></i> Pihak # ' + cardNumber);
            // Set auto-select untuk dropdown cloned
            clone.find('#namaInstansi' + cardNumber).val('Mitra'); // Auto-select opsi "Perguruan Tinggi"

            // Reattach the event handler with new unique IDs
            clone.find('#namaInstansi' + cardNumber).on('change', function() {
                var formAktif = $(this).closest('.penggiat-card');
                var selectedInstansi = $(this).val();

                // Lakukan request Ajax berdasarkan instansi yang dipilih
                $.ajax({
                    url: '/get-lembaga/' + selectedInstansi,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var cariLembaga = formAktif.find('#cariLembaga' +
                            cardNumber);
                        cariLembaga.empty();
                        $.each(data, function(key, value) {
                            cariLembaga.append('<option value="' + value
                                .id + '">' + value.nama_institusi +
                                '</option>');
                        });
                        // Menjaga Select2 agar tetap diinisialisasi
                        initializeSelect2(formAktif);
                    },
                    error: function(error) {
                        console.log('Error:', error);
                    }
                });

                // Sembunyikan tombol "+" jika Perguruan Tinggi dipilih
                if (selectedInstansi === 'Perguruan Tinggi') {
                    formAktif.find('button[data-bs-target="#myModalCreate"]').hide();
                } else {
                    formAktif.find('button[data-bs-target="#myModalCreate"]').show();
                }
            });

            // Tambahkan tombol "delete" ke cloned card header
            var deleteBtn = document.createElement('button');
            deleteBtn.type = 'button';
            deleteBtn.classList.add('btn', 'btn-danger', 'btn-sm', 'ms-auto',
            'me-0'); // Tambahkan kelas untuk styling
            deleteBtn.innerHTML = '<i class="bi bi-trash"></i>';
            deleteBtn.style.float = 'right'; // Atur posisi di kanan
            deleteBtn.addEventListener('click', function() {
                clone.remove(); // Hapus cloned form
            });
            clone.find('.card-header').append(deleteBtn); // Tambahkan tombol delete ke card header

            // Append cloned card ke container
            $('#penggiatContainer').append(clone);

            // Inisialisasi ulang Select2 dan collapse functionality hanya pada elemen yang baru di-clone
            initializeSelect2(clone);
            initializeCollapse(clone);
        });



        // Inisialisasi Select2 dan collapse functionality saat halaman pertama kali di-load
        initializeSelect2();
        initializeCollapse(document);

        // Inisialisasi Dropzone
        Dropzone.autoDiscover = false;
        const dropzone = new Dropzone("#my-dropzone", {
            url: "/your/upload/endpoint",
            maxFiles: 1,
            acceptedFiles: ".pdf",
            dictDefaultMessage: "Drag & Drop atau Klik area ini untuk upload"
        });
    });

    $(document).ready(function() {
        const $bentukKegiatanSelect = $('#bentukKegiatan');
        const $formsContainer = $('#formsContainer');
        const $formTemplate = $('#formTemplate');
        const maxTitleLength = 30; // Maximum number of characters for the form title

        // Initialize Select2 for the main dropdown
        $bentukKegiatanSelect.select2();

        // Use Select2's custom event
        $bentukKegiatanSelect.on('select2:select', function(e) {
            const selectedOption = e.params.data;
            if (selectedOption.id) {
                const $newForm = $($formTemplate.html());
                let truncatedTitle = selectedOption.text;

                // Truncate the title if it exceeds the max length
                if (truncatedTitle.length > maxTitleLength) {
                    truncatedTitle = truncatedTitle.substring(0, maxTitleLength) + '...';
                }

                $newForm.find('.form-title').text(truncatedTitle);

                // Add event listener to the delete button in the cloned form
                $newForm.find('.delete-btn').on('click', function() {
                    $(this).closest('.dynamic-form').remove();
                });

                $formsContainer.append($newForm);

                // Initialize Select2 for the new form's dropdowns
                $newForm.find('.select2-sasaran, .select2-indikator').select2();
            }
        });

        // Handle deletion for dynamically added forms
        $formsContainer.on('click', '.delete-btn', function() {
            $(this).closest('.dynamic-form').remove();
        });
    });
</script>
