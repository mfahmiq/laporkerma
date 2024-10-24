<x-layouts>
    <div class="container-fluid mt-4" style="overflow: hidden;">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">Data Kerjasama</h5>
                <div class="d-flex align-items-center">
                    <!-- Tombol Filter -->
                    {{-- <a href="#" class="btn btn-info btn-sm me-2" id="filterButton">
                        <i class="bi bi-funnel"></i>
                    </a> --}}
                    <!-- Tombol + Add -->
                    <a href="/kerma/create" class="btn btn-success btn-sm small">+ Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ url('kerma') }}" class="mb-3">
                    <!-- Filter Dropdowns (initially hidden) -->
                    <div id="filterDropdowns" class="row mb-3">
                        <div class="row">
                            <div class="col-md-6 mb-2 d-flex align-items-center">
                                <!-- Jenis Dokumen Kerjasama Select2 -->
                                <span class="input-group-text bg-transparent border-0"><i
                                        class="bi bi-file-earmark-text"></i></span>
                                <select class="form-select select2" id="jenis_kerma_id" name="jenis_kerma_id"
                                    data-placeholder="Pilih Jenis Dokumen Kerjasama">
                                    <option></option>
                                    @foreach ($jenis_kermas as $jenis)
                                        <option value="{{ $jenis->id }}"
                                            {{ request('jenis_kerma_id') == $jenis->id ? 'selected' : '' }}>
                                            {{ $jenis->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-2 d-flex align-items-center">
                                <!-- Sumber Pendanaan Select2 -->
                                <span class="input-group-text bg-transparent border-0"><i class="bi bi-cash"></i></span>
                                <select class="form-select select2" id="sumber_pendanaan_id" name="sumber_pendanaan_id"
                                    data-placeholder="Pilih Sumber Pendanaan">
                                    <option></option>
                                    @foreach ($sumber_pendanaans as $sumber)
                                        <option value="{{ $sumber->id }}"
                                            {{ request('sumber_pendanaan_id') == $sumber->id ? 'selected' : '' }}>
                                            {{ $sumber->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-2 d-flex align-items-center">
                                <!-- Status Kerjasama Select2 -->
                                <span class="input-group-text bg-transparent border-0"><i
                                        class="bi bi-check-circle"></i></span>
                                <select class="form-select select2" id="status_kerma_id" name="status_kerma_id"
                                    data-placeholder="Pilih Status Kerjasama">
                                    <option></option>
                                    @foreach ($status_kermas as $status)
                                        <option value="{{ $status->id }}"
                                            {{ request('status_kerma_id') == $status->id ? 'selected' : '' }}>
                                            {{ $status->status }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-2 d-flex align-items-center">
                                <!-- Bentuk Kegiatan Select2 -->
                                <span class="input-group-text bg-transparent border-0"><i
                                        class="bi bi-calendar-event"></i></span>
                                <select class="form-select select2" id="bentuk_kegiatan_id" name="bentuk_kegiatan_id"
                                    data-placeholder="Pilih Bentuk Kegiatan">
                                    <option></option>
                                    @foreach ($bentuk_kegiatans as $bentuk)
                                        <option value="{{ $bentuk->id }}"
                                            {{ request('bentuk_kegiatan_id') == $bentuk->id ? 'selected' : '' }}>
                                            {{ $bentuk->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Anda bisa menambahkan filter lain jika diperlukan -->
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-2 d-flex align-items-center">
                                <span class="input-group-text bg-transparent border-0"><i
                                        class="bi bi-calendar"></i></span>
                                <select class="form-select select2" id="tahun" name="tahun"
                                    data-placeholder="Pilih Tahun">
                                    <option value=""></option>
                                    @for ($year = now()->year; $year >= 2021; $year--)
                                        <option value="{{ $year }}"
                                            {{ request('tahun') == $year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-6 mb-2 d-flex align-items-center">
                                <!-- Bentuk Kegiatan Select2 -->
                                <span class="input-group-text bg-transparent border-0"><i
                                        class="bi bi-building"></i></span>
                                <select class="form-select select2" id="mitra_id" name="mitra_id"
                                    data-placeholder="Pilih Unit">
                                    <option></option>
                                    @foreach ($mitras as $mitra)
                                        <option value="{{ $mitra->id }}"
                                            {{ request('mitra_id') == $mitra->id ? 'selected' : '' }}>
                                            {{ $mitra->nama_institusi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Tabel Kerma -->
            <div class="table-responsive">
                <table id="example" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="small text-center">No</th>
                            <th class="small text-center">Judul</th>
                            <th class="small text-center">Unit</th>
                            <th class="small text-center">Status</th>
                            <th class="small text-center">Masa Berlaku</th>
                            <th class="small text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataKerma as $kerma)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <strong>{{ $kerma->nomor_dokumen ?? '-' }}</strong><br>
                                    {{ $kerma->judul }}<br>
                                    <small class="text-muted">{{ $kerma->jenis_kerma->name ?? '-' }}</small>
                                </td>
                                <td>
                                    @foreach ($kerma->penggiat_kermas as $penggiat)
                                        @if (auth()->user()->role === 'admin' || $loop->iteration > 1)
                                            <small>• </small>
                                            {{ $penggiat->mitra ? $penggiat->mitra->nama_institusi : '-' }}<br>
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $kerma->status_kerma->status }}</td>
                                <td>{{ \Carbon\Carbon::parse($kerma->tanggal_awal)->format('d/m/Y') }} -
                                    {{ \Carbon\Carbon::parse($kerma->tanggal_akhir)->format('d/m/Y') }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('kerma.show', $kerma->id) }}"
                                            class="btn btn-primary btn-sm me-2">
                                            <i class="bx bx-detail"></i>
                                        </a>
                                        <a href="{{ route('kerma.edit', $kerma->id) }}"
                                            class="btn btn-sm btn-warning me-2">
                                            <i class="bi bi-pencil-fill small"></i>
                                        </a>
                                        <form action="{{ route('kerma.destroy', $kerma->id) }}" method="POST"
                                            class="d-inline btn-delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger" id="btn-delete"
                                                data-id="{{ $kerma->id }}">
                                                <i class="bi bi-trash-fill small"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- jQuery and Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Custom Script for Select2 Initialization -->
    <script>
        $(document).ready(function() {
            // Inisialisasi Select2
            function initializeSelect2() {
                $('.select2').select2({
                    width: '100%',
                    placeholder: function() {
                        return $(this).data('placeholder');
                    },
                    allowClear: true
                });
            }

            initializeSelect2();

            // Auto submit form on dropdown change
            $('#jenis_kerma_id, #sumber_pendanaan_id, #status_kerma_id, #bentuk_kegiatan_id, #mitra_id, #tahun').on(
                'change',
                function() {
                    $(this).closest('form').submit(); // Submit form ketika pilihan berubah
                });

            $(document).on('click', '#btn-delete', function(e) {
                e.preventDefault();
                var kermaId = $(this).data('id');

                // SweetAlert2 dialog konfirmasi
                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Data kerjasama ini akan dihapus!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Hapus",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Permintaan AJAX untuk penghapusan
                        $.ajax({
                            url: '/kerma/' + kermaId,
                            method: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                // Tampilkan alert sukses
                                if (response.success) {
                                    Swal.fire({
                                        title: "Terhapus!",
                                        text: "Data Anda telah dihapus.",
                                        icon: "success"
                                    }).then(() => {
                                        location
                                            .reload(); // Muat ulang halaman untuk mencerminkan perubahan
                                    });
                                }
                            },
                            error: function(xhr) {
                                // Tampilkan alert error
                                Swal.fire({
                                    title: "Gagal!",
                                    text: "Gagal menghapus data. Silakan coba lagi.",
                                    icon: "error"
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
</x-layouts>
