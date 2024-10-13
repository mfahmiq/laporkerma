<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        /* Custom styles for Select2 */
        .select2-custom {
            width: 100% !important;
        }

        .select2-container {
            width: 100% !important;
        }

        .select2-container--default .select2-selection--single {
            height: calc(2.25rem + 2px) !important;
            padding: 0.375rem 0.75rem !important;
            font-size: 14px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 1.5 !important;
        }

        .select2-results__option {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-sm rounded-3" style="max-width: 500px; width: 100%;">
        <div class="bg-primary text-white p-4 d-flex align-items-center rounded-top">
            <div>
                <h4>Selamat Datang !</h4>
                <p>Silahkan registrasi terlebih dahulu</p>
            </div>
            <img src="{{ asset('images/logoitg.png') }}" alt="Background" class="ms-auto"
                style="width: 80px; height: auto;">
        </div>
        <small class="p-3 pb-0 fs-5 fw-bold d-block text-center">REGISTRASI</small>
        <div class="p-4">
            <form action="/register" method="post">
                @csrf
                <div class="mb-1">
                    <label for="name" class="form-label">Nama</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <!-- Icon Nama -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z" />
                            </svg>
                        </span>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" autofocus
                            value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <div style="color: red">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-1">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <!-- Icon Email -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                id="email">
                                <path fill="none" d="M0 0h24v24H0V0z"></path>
                                <path
                                    d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-.4 4.25l-7.07 4.42c-.32.2-.74.2-1.06 0L4.4 8.25c-.25-.16-.4-.43-.4-.72 0-.67.73-1.07 1.3-.72L12 11l6.7-4.19c.57-.35 1.3.05 1.3.72 0 .29-.15.56-.4.72z">
                                </path>
                            </svg>
                        </span>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <div style="color: red">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-1">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <!-- Icon Password -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                <path
                                    d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z" />
                            </svg>
                        </span>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror">
                    </div>
                    @error('password')
                        <div style="color: red">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-1">
                    <label for="instansi" class="form-label">Instansi</label>
                    <div class="d-flex align-items-center">
                        <span class="input-group-text">
                            <!-- Icon Instansi -->
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 4h12M6 4v16M6 4H5m13 0v16m0-16h1m-1 16H6m12 0h1M6 20H5M9 7h1v1H9V7Zm5 0h1v1h-1V7Zm-5 4h1v1H9v-1Zm5 0h1v1h-1v-1Zm-3 4h2a1 1 0 0 1 1 1v4h-4v-4a1 1 0 0 1 1-1Z" />
                            </svg>
                        </span>
                        <select class="form-select select2" name="instansi_id" data-placeholder="Pilih Nama Instansi">
                            <option value=""></option>
                            @foreach ($mitras as $mitra)
                                <option value="{{ $mitra->id }}">
                                    {{ $mitra->nama_institusi }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('instansi_id')
                        <div style="color: red">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                @include('mitra.mitraCreate')
                <button type="submit" class="btn btn-primary w-100 mt-4 rounded-2">Daftar</button>
            </form>
            <small class="d-block text-center mt-2">Sudah punya akses?</small>
            <small class="d-block text-center mt-2"><a href="/login">LOGIN</a></small>
        </div>
    </div>

    <!-- Tambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Inisialisasi Select2 pada elemen yang ada di luar modal
            $('.select2').select2({
                placeholder: "Pilih Nama Instansi",
                allowClear: true
            });

            // Inisialisasi Select2 pada elemen select di dalam modal
            $('#myModalCreate').on('shown.bs.modal', function() {
                // Inisialisasi Select2 setiap kali modal ditampilkan
                $('.select2').select2({
                    placeholder: "Pilih Klasifikasi Mitra",
                    allowClear: true
                });
            });
        });
    </script>

</body>

</html>
