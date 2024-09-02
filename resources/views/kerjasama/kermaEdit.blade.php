<x-layouts>
    <div class="container-fluid mt-4" style="font-size: 14px;">
        <!-- Container Pertama -->
        <div class="card">
            <div class="card-body">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Edit Kerjasama</h5>
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
                                        <select class="form-select select2" id="status">
                                            <option selected>Status Kerja Sama</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggalAwal" class="form-label">Tanggal Awal</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="tanggalAwal-addon"><i
                                                    class="bi bi-calendar-date"></i></span>
                                            <input type="date" class="form-control" id="tanggalAwal"
                                                aria-describedby="tanggalAwal-addon">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggalBerakhir" class="form-label">Tanggal Berakhir</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="tanggalBerakhir-addon"><i
                                                    class="bi bi-calendar-date"></i></span>
                                            <input type="date" class="form-control" id="tanggalBerakhir"
                                                aria-describedby="tanggalBerakhir-addon">
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
                            <select class="form-select select2" id="jenisDokumen">
                                <option selected>Pilih jenis dokumen kerjasama</option>
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
                                                <select class="form-select me-2" id="namaInstansi"
                                                    style="width: 20%;">
                                                    <option selected>Mitra</option>
                                                    <option>Perguruan Tinggi</option>
                                                </select>
                                                <select class="form-select select2 me-2" id="cariLembaga"
                                                    style="width: 80%;">
                                                    <option value="1">Lembaga 1</option>
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
                            <label for="bentukKegiatan" class="form-label">Pilih bentuk kegiatan</label>
                            <select class="form-select" id="bentukKegiatan" placeholder="Pilih Bentuk Kegiatan">
                                <option value="">Pilih Bentuk Kegiatan</option>
                                <option value="asistensiMengajar">Asistensi Mengajar di Satuan Pendidikan-Kampus
                                    Merdeka</option>
                                <option value="asistensi">Asistensi Satuan Pendidikan-Kampus Merdeka</option>
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
                                    <div class="form-group mb-3">
                                        <label for="sasaran" class="form-label">Sasaran</label>
                                        <select class="form-select select2-sasaran">
                                            <option value="">Pilih sasaran program</option>
                                            <option value="sasaran1">Sasaran 1</option>
                                            <option value="sasaran2">Sasaran 2</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="indikatorKinerja" class="form-label">Indikator Kinerja</label>
                                        <select class="form-select select2-indikator">
                                            <option value="">Pilih indikator kinerja</option>
                                            <option value="indikator1">Indikator 1</option>
                                            <option value="indikator2">Indikator 2</option>
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
    $('#myModal').on('shown.bs.modal', function() {
        initializeSelect2($(this));
    });

    function initializeSelect2(container = document) {
        $(container).find('.select2').each(function() {
            $(this).select2({
                dropdownParent: $(this).parent(),
                width: '100%'
            }).on('select2:open', function() {
                // Add class to body to hide horizontal scrollbar
                $('body').addClass('no-horizontal-scroll');
            }).on('select2:close', function() {
                // Remove class from body to show scrollbar again
                $('body').removeClass('no-horizontal-scroll');
            });
        });
    }

    document.getElementById('addPenggiatBtn').addEventListener('click', function() {
        var originalCard = document.querySelector('.penggiat-card');
        var clone = originalCard.cloneNode(true);

        var cardNumber = document.querySelectorAll('.penggiat-card').length + 1;
        clone.querySelector('.card-header').innerHTML = '<i class="bi bi-geo-alt"></i> Pihak # ' + cardNumber;

        // Add the "deleete" button to the cloned card header
        var deleteBtn = document.createElement('button');
        deleteBtn.type = 'button';
        deleteBtn.classList.add('btn', 'btn-danger', 'btn-sm', 'ms-auto',
            'me-0'); // Add classes to style the button
        deleteBtn.innerHTML = '<i class="bi bi-trash"></i>';
        deleteBtn.style.float = 'right'; // Align to the right
        deleteBtn.addEventListener('click', function() {
            clone.remove(); // Remove the cloned form
        });
        clone.querySelector('.card-header').appendChild(deleteBtn);

        // Remove any existing Select2 elements from the clone
        clone.querySelectorAll('.select2-container').forEach(el => el.remove());

        // Reset the values of all form elements in the clone
        clone.querySelectorAll('input, select, textarea').forEach(el => {
            el.value = '';
            if (el.classList.contains('select2-hidden-accessible')) {
                $(el).select2('destroy');
            }
        });

        // Update collapse functionality
        var collapseToggle = clone.querySelector('.penanggungJawabToggle');
        var collapseContent = clone.querySelector('.penanggungJawabCollapse');

        // Generate unique IDs for the new collapse
        var uniqueId = 'penanggungJawabCollapse' + cardNumber;
        collapseContent.id = uniqueId;
        collapseToggle.setAttribute('data-bs-target', '#' + uniqueId);
        collapseToggle.setAttribute('aria-controls', uniqueId);

        // Append the cloned card to the penggiatContainer
        document.getElementById('penggiatContainer').appendChild(clone);

        // Reinitialize Select2 for the newly added select elements
        initializeSelect2(clone);

        // Reinitialize Select2 for the newly added select elements
        $(clone).find('.select2').each(function() {
            $(this).select2({
                dropdownParent: $(this).parent(),
                width: '100%'
            });
        });

        // Reinitialize collapse functionality
        new bootstrap.Collapse(collapseContent, {
            toggle: false
        });

        // Add click event listener for toggle
        collapseToggle.addEventListener('click', function() {
            bootstrap.Collapse.getOrCreateInstance(collapseContent).toggle();
        });
    });

    // Initialize Select2 and collapse functionality on page load
    $(document).ready(function() {
        $('.select2').each(function() {
            $(this).select2({
                dropdownParent: $(this).parent(),
                width: '100%'
            });
        });

        // Initialize collapse functionality for existing forms
        document.querySelectorAll('.penanggungJawabToggle').forEach(function(toggle) {
            var content = toggle.nextElementSibling;
            new bootstrap.Collapse(content, {
                toggle: false
            });
            toggle.addEventListener('click', function() {
                bootstrap.Collapse.getOrCreateInstance(content).toggle();
            });
        });

        // Dropzone initialization
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
