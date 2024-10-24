<x-layouts>
    <div class="container-fluid mt-4">

        <div class="card">
            <h5 class="card-header d-flex justify-content-between align-items-center bg-light">
                <div>
                    <i class="bi bi-people"></i> KERJASAMA
                </div>
                <div>
                    <a href="/kerma/{{ $kerma->id }}/edit" class="btn btn-success btn-sm">
                        <i class="bx bx-edit"></i> Edit
                    </a>
                </div>
            </h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-7">
                        <h6 class="text-primary"><i class="bi bi-info-circle"></i> Informasi Umum</h6>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <p><strong>Status Kerjasama:</strong> <span
                                        class="text-muted">{{ $kerma->status_kerma->status }}</span></p>
                                <p><strong>Tanggal Awal:</strong> <span
                                        class="text-muted">{{ $kerma->tanggal_awal }}</span></p>
                                <p><strong>Tanggal Berakhir:</strong> <span
                                        class="text-muted">{{ $kerma->tanggal_akhir ?? 'N/A' }}</span></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Jenis Dokumen:</strong> <span
                                        class="text-muted">{{ $kerma->jenis_kerma->name }}</span></p>
                                <p><strong>Nomor Dokumen:</strong> <span
                                        class="text-muted">{{ $kerma->nomor_dokumen }}</span></p>
                            </div>
                        </div>
                        <h6 class="text-warning"><i class="bi bi-file-earmark-text"></i> Judul & Deskripsi</h6>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <p><strong>Judul Kerjasama:</strong> <span class="text-muted">{{ $kerma->judul }}</span>
                                </p>
                                <p><strong>Deskripsi:</strong> <span class="text-muted">{{ $kerma->deskripsi }}</span>
                                </p>
                            </div>
                        </div>
                        <h6 class="text-success"><i class="bi bi-cash"></i> Anggaran & Pendanaan</h6>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <p><strong>Anggaran:</strong> <span class="text-muted">Rp.
                                        {{ number_format($kerma->anggaran, 0, ',', '.') }}</span></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Sumber Pendanaan:</strong> <span
                                        class="text-muted">{{ $kerma->sumber_pendanaan->name }}</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <h6 class="text-danger"><i class="bi bi-file-earmark-pdf"></i> Dokumen Kerjasama</h6>
                        @if ($kerma->dokumen)
                            <embed src="{{ asset('storage/' . $kerma->dokumen) }}" type="application/pdf"
                                width="100%" height="500px" style="border: 1px solid #ddd;" />
                        @else
                            <p class="text-muted">Tidak ada dokumen yang tersedia.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Penggiat Kerma dan Bentuk Kegiatan dalam Grid -->
        <div class="row">
            <!-- Card Penggiat Kerma -->
            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-header bg-light">
                        <i class="bi bi-people"></i> PENGGIAT KERJASAMA
                    </h5>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="small text-center">No</th>
                                <th class="small text-center">Penggiat</th>
                                <th class="small text-center">Penandatangan</th>
                                <th class="small text-center">Penanggung Jawab</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kerma->penggiat_kermas as $penggiat)
                                <tr>
                                    <td class="text-center">
                                        <p>{{ $loop->iteration }}</p>
                                    </td>
                                    <td>
                                        <small>{{ $penggiat->mitra->nama_institusi ?? '-' }}</small><br>
                                    </td>
                                    <td>
                                        <small>
                                            {{ $penggiat->nama_penandatangan ?? '-' }} ( {{ $penggiat->jabatan_penandatangan ?? '-' }} )
                                        </small>
                                    </td>
                                    <td>
                                        <small>
                                            {{ $penggiat->nama_penanggungjawab ?? '-' }} ( {{ $penggiat->jabatan_penanggungjawab ?? '-' }} )
                                        </small>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Card Bentuk Kegiatan -->
            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-header bg-light">
                        <i class="bi bi-book"></i> BENTUK KEGIATAN
                    </h5>
                    <div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="small text-center">No</th>
                                    <th class="small text-center">Bentuk Kegiatan</th>
                                    <th class="small text-center">Sasaran</th>
                                    <th class="small text-center">Indikator</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kerma->detail_kegiatans as $detail)
                                    <tr>
                                        <td class="text-center">
                                            <p>{{ $loop->iteration }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $detail->bentuk_kegiatan->name ?? '-' }}</p><br>
                                        </td>
                                        <td>
                                            <p>{{ $detail->sasaran->name ?? '-' }}</p><br>
                                        </td>
                                        <td>
                                            <p>{{ $detail->indikator->indikator ?? '-' }}</p><br>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts>

<style>
    .card-header {
        border-bottom: 2px solid #0056b3;
    }

    hr {
        border-top: 1px solid #ddd;
    }

    p {
        font-size: 14px;
        line-height: 1.5;
    }

    .card-body {
        background-color: #f9f9f9;
    }

    .text-muted {
        font-style: italic;
    }
</style>
