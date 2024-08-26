<x-layouts>
    <div class="container mt-4" style="font-size: 14px;">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="flex-fill me-3">
                        <div class="mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <i class="bi bi-calendar"></i> MASA BERLAKU
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select select2-custom" id="status">
                                            <option selected>Status Kerja Sama</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggalAwal" class="form-label">Tanggal Awal</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="tanggalAwal-addon"><i class="bi bi-calendar-date"></i></span>
                                            <input type="date" class="form-control" id="tanggalAwal" aria-describedby="tanggalAwal-addon">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggalBerakhir" class="form-label">Tanggal Berakhir</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="tanggalBerakhir-addon"><i class="bi bi-calendar-date"></i></span>
                                            <input type="date" class="form-control" id="tanggalBerakhir" aria-describedby="tanggalBerakhir-addon">
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                    <div class="flex-fill ms-3">
                        <div class="mb-3">
                            <label for="jenisDokumen" class="form-label">Jenis Dokumen Kerjasama</label>
                            <select class="form-select select2-custom" id="jenisDokumen">
                                <option selected>Pilih jenis dokumen kerjasama</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nomorDokumen" class="form-label">Nomor Dokumen</label>
                            <div class="input-group">
                                <span class="input-group-text" id="nomorDokumen-addon"><i class="bi bi-hash"></i></span>
                                <input type="text" class="form-control" id="nomorDokumen" aria-describedby="nomorDokumen-addon" placeholder="#">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="judulKerjasama" class="form-label">Judul Kerjasama</label>
                            <div class="input-group">
                                <span class="input-group-text" id="judulKerjasama-addon"><i class="bi bi-card-heading"></i></span>
                                <input type="text" class="form-control" id="judulKerjasama" aria-describedby="judulKerjasama-addon" placeholder="Judul">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" rows="4" placeholder="Ringkasan singkat terkait cakupan atau kegiatan kerja sama"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Mengatur ukuran font placeholder untuk elemen tertentu */
        #status::placeholder,
        #tanggalAwal::placeholder,
        #tanggalBerakhir::placeholder,
        #jenisDokumen::placeholder,
        #nomorDokumen::placeholder,
        #judulKerjasama::placeholder,
        #deskripsi::placeholder {
            font-size: 14px; /* Ubah ukuran font sesuai kebutuhan */
        }
    </style>
</x-layouts>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Dropzone JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
<script>
    $(document).ready(function () {
        // Initialize Select2
        $('#status').select2({
            width: 'resolve'
        });
        $('#jenisDokumen').select2({
            width: 'resolve'
        });

        // Ensure Dropzone.autoDiscover is set to false
        Dropzone.autoDiscover = false;

        // Initialize Dropzone
        const dropzone = new Dropzone("#my-dropzone", {
            url: "/your/upload/endpoint", // Replace with your actual upload endpoint
            maxFiles: 1,
            acceptedFiles: ".pdf", // Only accept PDF files
            maxFilesize: 5, // Limit to 5 MB
            addRemoveLinks: true,
            dictDefaultMessage: "Drag & Drop atau Klik area ini untuk upload", // Customize default message
            init: function () {
                this.on("success", function (file, response) {
                    console.log("File uploaded successfully:", response);
                });
                this.on("error", function (file, response) {
                    console.log("Error uploading file:", response);
                });
            }
        });
    });
</script>
