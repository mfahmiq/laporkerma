<x-layouts>
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">Tabel Mitra</h5>
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
                    <a class="btn btn-success btn-sm small" data-bs-toggle="modal" data-bs-target="#myModalCreate">+
                        Tambah</a>
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
                            <select class="form-select select2" id="klasifikasiMitra"
                                data-placeholder="Pilih Klasifikasi Mitra">
                                <option></option>
<<<<<<< HEAD
                                @foreach ($klasifikasi_mitras as $klasifikasi)
                                    <option value="{{ $klasifikasi->id }}">{{ $klasifikasi->name }}</option>
                                @endforeach
=======
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
>>>>>>> bd6d88dc7ef8172606f4d4bf0925e871c0d01483
                            </select>
                        </div>
                        <div class="col-md-6 mb-2 d-flex align-items-center">
                            <!-- Negara Icon -->
                            <span class="input-group-text bg-transparent border-0"><i class="bi bi-flag"></i></span>
                            <!-- Negara Select2 -->
                            <select class="form-select select2" id="negara" data-placeholder="Pilih Negara">
                                <option></option>
<<<<<<< HEAD
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
=======
                                <option value="ID">Indonesia</option>
                                <option value="US">Amerika Serikat</option>
>>>>>>> bd6d88dc7ef8172606f4d4bf0925e871c0d01483
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
                            @foreach ($dataMitra as $mitra)
<<<<<<< HEAD
                                <tr>
                                    <td class="small text-center">{{ $loop->iteration }}</td>
                                    <td class="small">{{ $mitra->nama_institusi }}</td>
                                    <td class="small">{{ $mitra->country->name }}</td>
                                    <td class="small">{{ $mitra->status }}</td>
                                    <td class="text-center">
                                        {{-- <a href="/mitra/{{ $mitra->id }}" class="btn btn-primary btn-sm me-2">
                                        <i class="bx bx-detail"></i>
                                    </a> --}}
                                        <a href="{{ url('mitraEdit') }}" data-bs-toggle="modal"
                                            data-bs-target="#myModalEdit" class="btn btn-sm btn-warning me-2">
                                            <i class="bi bi-pencil-fill small"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger btn-delete" id="delete">
                                            <i class="bi bi-trash-fill small"></i>
                                        </a>
                                    </td>
                                </tr>
=======
                            <tr>
                                <td class="small text-center">{{ $loop->iteration }}</td>
                                <td class="small">{{ $mitra->nama_institusi }}</td>
                                <td class="small">{{ $mitra->negara }}</td>
                                <td class="small">{{ $mitra->status }}</td>
                                <td class="text-center">
                                    {{-- <a href="/mitra/{{ $mitra->id }}" class="btn btn-primary btn-sm me-2">
                                        <i class="bx bx-detail"></i>
                                    </a> --}}
                                    <a href="{{ url('mitraEdit') }}" data-bs-toggle="modal" data-bs-target="#myModalEdit"
                                        class="btn btn-sm btn-warning me-2">
                                        <i class="bi bi-pencil-fill small"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger btn-delete" id="delete">
                                        <i class="bi bi-trash-fill small"></i>
                                    </a>
                                </td>
                            </tr>
>>>>>>> bd6d88dc7ef8172606f4d4bf0925e871c0d01483
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Modal -->
    @include('mitra.mitraEdit')
    @include('mitra.mitraCreate')



    <!-- jQuery and Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Custom Script for Select2 with dropdownParent -->
    <script>
        $(document).ready(function() {
            // Fungsi untuk inisialisasi Select2 pada elemen yang relevan
            function initializeSelect2() {
                // Inisialisasi Select2 untuk dropdown filter
                $('#filterDropdowns .select2').select2({
                    width: '100%',
                    placeholder: function() {
                        return $(this).data('placeholder');
                    },
                    allowClear: true
                });

                // Inisialisasi Select2 untuk dropdown dalam myModalEdit
                $('#myModalEdit .select2').select2({
                    width: '100%',
                    placeholder: function() {
                        return $(this).data('placeholder');
                    },
                    allowClear: true,
                    dropdownParent: $('#myModalEdit') // Attach dropdown to the modal
                });

                // Inisialisasi Select2 untuk dropdown dalam myModalCreate
                $('#myModalCreate .select2').select2({
                    width: '100%',
                    placeholder: function() {
                        return $(this).data('placeholder');
                    },
                    allowClear: true,
                    dropdownParent: $('#myModalCreate') // Attach dropdown to the modal
                });

                // Inisialisasi Select2 untuk elemen tambahan
                $('#klasifikasiMitra').select2({
                    width: '100%',
                    dropdownParent: $('#klasifikasiMitra').parent() // Ensure dropdown is attached to parent
                });

                $('#negara').select2({
                    width: '100%',
                    allowClear: true,
                    dropdownParent: $('#negara').parent() // Ensure dropdown is attached to parent
                });
            }

            // Inisialisasi Select2 pertama kali
            initializeSelect2();

            // Toggle filter dropdowns
            $('#filterButton').on('click', function(e) {
                e.preventDefault();
                $('#filterDropdowns').toggle();
                // Reinitialize Select2 when filter dropdowns are shown
                initializeSelect2();
            });

            // Reinitialize Select2 ketika modal myModalEdit ditampilkan
            $('#myModalEdit').on('shown.bs.modal', function() {
                console.log('Modal Edit ditampilkan');
                $('#myModalEdit .select2').select2({
                    width: '100%',
                    placeholder: function() {
                        return $(this).data('placeholder');
                    },
                    allowClear: true,
                    dropdownParent: $('#myModalEdit')
                });
            });

            // Reinitialize Select2 ketika modal myModalCreate ditampilkan
            $('#myModalCreate').on('shown.bs.modal', function() {
                console.log('Modal Create ditampilkan');
                $('#myModalCreate .select2').select2({
                    width: '100%',
                    placeholder: function() {
                        return $(this).data('placeholder');
                    },
                    allowClear: true,
                    dropdownParent: $('#myModalCreate')
                });
            });

            // Ensure Dropzone.autoDiscover is set to false
            Dropzone.autoDiscover = false;
        });
    </script>

</x-layouts>
