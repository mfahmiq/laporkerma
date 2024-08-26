<x-layouts>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0 small">Data Table</h4>
                <div class="d-flex align-items-center">
                    <!-- Tombol Filter -->
                    <a href="#" class="btn btn-info btn-sm me-2" id="filterButton">
                        <i class="bi bi-funnel"></i>
                    </a>
                    <!-- Tombol Recycle -->
                    <a href="#" class="btn btn-success btn-sm me-2">
                        <i class="bi bi-recycle"></i>
                    </a>
                    <!-- Tombol + Add -->
                    <a class="btn btn-success btn-sm small" data-bs-toggle="modal" data-bs-target="#myModal">+ Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <!-- Filter Dropdowns (initially hidden) -->
                <div id="filterDropdowns" class="mb-3" style="display: none;">
                    <div class="row">
                        <div class="col-md-6 mb-2 d-flex align-items-center">
                            <!-- Klasifikasi Mitra Icon -->
                            <span class="input-group-text bg-transparent border-0"><i class="bi bi-list"></i></span>
                            <!-- Klasifikasi Mitra Select2 -->
                            <select class="form-select select2 flex-grow-1" id="klasifikasiMitra" data-placeholder="Pilih Klasifikasi Mitra" style="min-width: 0;">
                                <option></option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-2 d-flex align-items-center">
                            <!-- Negara Icon -->
                            <span class="input-group-text bg-transparent border-0"><i class="bi bi-flag"></i></span>
                            <!-- Negara Select2 -->
                            <select class="form-select select2 flex-grow-1" id="negara" data-placeholder="Pilih Negara" style="min-width: 0;">
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
                                <th class="small text-center" style="width: 150px;">Nama</th>
                                <th class="small text-center" style="width: 50px;">Negara</th>
                                <th class="small text-center" style="width: 50px;">Status</th>
                                <th class="small text-center" style="width: 100px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="small text-center">1</td>
                                <td class="small">System Architect</td>
                                <td class="small">Indonesia</td>
                                <td class="small">Digunakan</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-primary btn-sm me-2">
                                        <i class="bi bi-info-circle-fill small"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-warning me-2">
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

    <!-- Include Modal -->
    @include('mitra.mitraEdit')

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Custom CSS to reduce font size -->
    <style>
        .select2-container--default .select2-selection--single .select2-selection__rendered,
        .select2-container--default .select2-results__option {
            font-size: 12px;
        }
        
        .input-group-text {
            padding: 0.375rem 0.75rem;
        }

        .form-select.select2 {
            flex-grow: 1;
        }
    </style>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    
    <!-- Custom Script for Select2 with dropdownParent -->
    <script>
        $(document).ready(function() {
            function initializeSelect2() {
                // Initialize Select2 for filter dropdowns
                $('#filterDropdowns .select2').select2({
                    width: '100%',
                    placeholder: function(){
                        return $(this).data('placeholder');
                    },
                    allowClear: true
                });

                // Initialize Select2 for modal dropdowns
                $('#myModal .select2').select2({
                    width: '100%',
                    placeholder: function(){
                        return $(this).data('placeholder');
                    },
                    allowClear: true,
                    dropdownParent: $('#myModal') // Attach dropdown to the modal
                });
            }

            initializeSelect2();

            // Toggle filter dropdowns
            $('#filterButton').on('click', function(e) {
                e.preventDefault();
                $('#filterDropdowns').toggle();
                // Reinitialize Select2 when filter dropdowns are shown
                initializeSelect2();
            });

            // Reinitialize Select2 when modal is shown
            $('#myModal').on('shown.bs.modal', function () {
                initializeSelect2();
            });

            // Ensure Select2 works when modal is hidden
            $('#myModal').on('hidden.bs.modal', function () {
                initializeSelect2();
            });
        });
    </script>
</x-layouts>
