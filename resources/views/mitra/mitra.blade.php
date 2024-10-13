<x-layouts>
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">Tabel Mitra</h5>
                <div class="d-flex align-items-center">
                    <!-- Tombol + Add -->
                    <a class="btn btn-success btn-sm small" data-bs-toggle="modal" data-bs-target="#myModalCreate">+
                        Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <!-- Filter Form -->
                <form method="GET" action="{{ url('mitra') }}" class="mb-3">
                    <div id="filterDropdowns" class="row mb-3">
                        <div class="col-md-6 mb-2 d-flex align-items-center">
                            <span class="input-group-text bg-transparent border-0"><i
                                    class="bi bi-buildings"></i></span>
                            <select class="form-select select2" id="klasifikasi_mitra_id" name="klasifikasi_mitra_id"
                                data-placeholder="Pilih Klasifikasi Mitra">
                                <option></option>
                                @foreach ($klasifikasi_mitras as $klasifikasi)
                                    <option value="{{ $klasifikasi->id }}"
                                        {{ request('klasifikasi_mitra_id') == $klasifikasi->id ? 'selected' : '' }}>
                                        {{ $klasifikasi->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-2 d-flex align-items-center">
                            <span class="input-group-text bg-transparent border-0"><i class="bi bi-flag"></i></span>
                            <select class="form-select select2" id="country_id" name="country_id"
                                data-placeholder="Pilih Negara">
                                <option></option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}"
                                        {{ request('country_id') == $country->id ? 'selected' : '' }}>
                                        {{ $country->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>

                <!-- Tabel Mitra -->
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="small text-center">No</th>
                                <th class="small text-center">Nama</th>
                                <th class="small text-center">Negara</th>
                                <th class="small text-center">Status</th>
                                <th class="small text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataMitra as $mitra)
                                <tr>
                                    <td class="small text-center">{{ $loop->iteration }}</td>
                                    <td class="small">
                                        <div class="m-b-sm">{{ $mitra->nama_institusi }}</div>
                                        <span class="label text-muted">{{ $mitra->klasifikasi_mitra->name }}</span>
                                    </td>
                                    <td class="small">{{ $mitra->country->name }}</td>
                                    <td class="small">{{ $mitra->status }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="#" data-id="{{ $mitra->id }}"
                                                class="btn btn-sm btn-warning btn-edit me-2">
                                                <i class="bi bi-pencil-fill small"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-danger btn-delete" id="btn-delete"
                                                data-id="{{ $mitra->id }}">
                                                <i class="bi bi-trash-fill small"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Modal -->
    @include('mitra.mitraCreate')
    @include('mitra.mitraEdit')

    <!-- jQuery and Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Custom Script for Select2 with dropdownParent -->
    <script>
        $(document).ready(function() {
            function initializeSelect2() {
                $('.select2').select2({
                    width: '100%',
                    placeholder: function() {
                        return $(this).data('placeholder');
                    },
                    allowClear: true
                });

                $('#myModalEdit .select2').select2({
                    width: '100%',
                    placeholder: function() {
                        return $(this).data('placeholder');
                    },
                    allowClear: true,
                    dropdownParent: $('#myModalEdit')
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

            initializeSelect2();

            // Auto submit form on dropdown change
            $('#klasifikasi_mitra_id, #country_id').on('change', function() {
                $(this).closest('form').submit(); // Submit the form when selection changes
            });

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
                        // Menampilkan SweetAlert2 ketika berhasil menambah data
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Data mitra berhasil disimpan!",
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            location.reload(); // Reload halaman untuk melihat perubahan
                        });
                    },
                    error: function(xhr) {
                        // Menangani error dan menampilkan pesan
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = '';
                        $.each(errors, function(key, value) {
                            errorMessage += value[0] +
                                '\n'; // Menggabungkan pesan kesalahan
                        });
                        Swal.fire("Kesalahan!", errorMessage, "error");
                    }
                });
            });

            $(document).on('click', '#btn-update', function(e) {
                e.preventDefault();

                // SweetAlert2 dialog konfirmasi untuk menyimpan perubahan
                Swal.fire({
                    title: "Apakah Anda ingin menyimpan perubahan?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Simpan",
                    denyButtonText: "Jangan simpan"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Mengambil data dari form untuk dikirim ke server
                        var formData = $('#editForm').serialize();

                        // AJAX request untuk menyimpan perubahan
                        $.ajax({
                            url: $('#editForm').attr('action'),
                            method: 'PUT', // Pastikan metode adalah PUT untuk update
                            data: formData,
                            success: function(response) {
                                Swal.fire("Tersimpan!", response.message, "success")
                                    .then(() => {
                                        location
                                            .reload(); // Reload halaman untuk melihat perubahan
                                    });
                            },
                            error: function(xhr) {
                                // Menangani error dan menampilkan pesan
                                var errors = xhr.responseJSON.errors;
                                var errorMessage = '';
                                $.each(errors, function(key, value) {
                                    errorMessage += value[0] +
                                        '\n'; // Menggabungkan pesan kesalahan
                                });
                                Swal.fire("Kesalahan!", errorMessage, "error");
                            }
                        });
                    } else if (result.isDenied) {
                        Swal.fire("Perubahan tidak disimpan", "", "info");
                    }
                });
            });

            $(document).on('click', '.btn-edit', function(e) {
                e.preventDefault();
                var mitraId = $(this).data('id');

                $.ajax({
                    url: '/mitra/' + mitraId + '/edit',
                    method: 'GET',
                    success: function(response) {
                        var mitra = response.mitra;
                        $('#klasifikasiEdit').val(mitra.klasifikasi_mitra_id).trigger('change');
                        $('#nama_institusiEdit').val(mitra.nama_institusi);
                        $('#alamatEdit').val(mitra.alamat);
                        $('#countryEdit').val(mitra.country_id).trigger('change');
                        $('#telpEdit').val(mitra.telp);
                        $('#websiteEdit').val(mitra.website);
                        $('#editForm').attr('action', '/mitra/' + mitraId);
                        $('#myModalEdit').modal('show');
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                    }
                });
            });

            $(document).on('click', '#btn-delete', function(e) {
                e.preventDefault();
                var mitraId = $(this).data('id');
                var row = $(this).closest('tr'); // Ambil elemen baris untuk mendapatkan status

                // Ambil status dari kolom status di baris yang sama
                var status = row.find('td:eq(3)').text()
            .trim(); // Mengambil nilai dari kolom status (kolom ke-4)

                if (status === "Digunakan") {
                    // Jika status "Digunakan", tampilkan pesan kesalahan
                    Swal.fire({
                        icon: 'error',
                        title: 'Tidak dapat menghapus!',
                        text: 'Mitra ini sedang digunakan dan tidak dapat dihapus.',
                    });
                } else {
                    // Jika status "Tidak Digunakan", konfirmasi penghapusan
                    Swal.fire({
                        title: "Apakah Anda yakin?",
                        text: "Anda tidak akan dapat mengembalikannya!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ya, hapus ini!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Permintaan AJAX untuk penghapusan
                            $.ajax({
                                url: '/mitra/' + mitraId,
                                method: 'DELETE',
                                data: {
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                    // Tampilkan alert sukses
                                    Swal.fire({
                                        title: "Berhasil!",
                                        text: "Data telah dihapus.",
                                        icon: "success"
                                    }).then(() => {
                                        location
                                    .reload(); // Muat ulang halaman untuk mencerminkan perubahan
                                    });
                                },
                                error: function(xhr) {
                                    console.error('Error:', xhr.responseText);
                                }
                            });
                        }
                    });
                }
            });
        });
    </script>
</x-layouts>
