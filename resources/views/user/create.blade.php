<x-layouts>
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Tambah User</h5>
            </div>
            <div class="card-body">
                <form id="addUserForm" action="/user" method="post">
                    @csrf
                    <div class="mb-1">
                        <label for="name" class="form-label">Nama</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <!-- Ikon Nama -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                    height="20">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z" />
                                </svg>
                            </span>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" autofocus
                                value="{{ old('name') }}">
                        </div>
                        @error('name')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <!-- Ikon Email -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" id="email">
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
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <!-- Ikon Password -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                    height="20">
                                    <path
                                        d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z" />
                                </svg>
                            </span>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror">
                        </div>
                        @error('password')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="instansi" class="form-label">Unit</label>
                        <div class="d-flex align-items-center">
                            <span class="input-group-text">
                                <!-- Ikon Unit -->
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                    height="20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 4h12M6 4v16M6 4H5m13 0v16m0-16h1m-1 16H6m12 0h1M6 20H5M9 7h1v1H9V7Zm5 0h1v1h-1V7Zm-5 4h1v1H9v-1Zm5 0h1v1h-1v-1Zm-3 4h2a1 1 0 0 1 1 1v4h-4v-4a1 1 0 0 1 1-1Z" />
                                </svg>
                            </span>
                            <select class="form-select select2" name="instansi_id" data-placeholder="Pilih Nama Unit">
                                <option value=""></option>
                                @foreach ($mitras as $mitra)
                                    <option value="{{ $mitra->id }}">{{ $mitra->nama_institusi }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('instansi_id')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="role" class="form-label">Role</label>
                        <div class="d-flex align-items-center">
                            <span class="input-group-text">
                                <!-- Ikon Role -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z" />
                                </svg>
                            </span>
                            <select class="form-select select2 @error('role') is-invalid @enderror" name="role" data-placeholder="Pilih Role">
                                <option value="">Pilih Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        @error('role')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success w-100 mt-4 rounded-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi Select2 pada elemen yang ada di luar modal
            $('.select2').select2({
                placeholder: "Pilih Nama Instansi",
                allowClear: true
            });
        });

        // Menangani pengiriman form dengan AJAX dan menampilkan SweetAlert
        document.getElementById('addUserForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman form secara default

            const formData = new FormData(this); // Mengambil data dari form

            // Mengirim permintaan AJAX untuk pendaftaran
            fetch('/user', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (response.ok) {
                        return response.json(); // Mengambil respons JSON
                    }
                    return Promise.reject(response);
                })
                .then(data => {
                    // Menampilkan SweetAlert jika registrasi berhasil
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "User berhasil ditambahkan!",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = data.redirect; // Alihkan ke halaman yang dituju
                    });
                })
                .catch(error => {
                    if (error.status === 422) {
                        return error.json().then(data => {
                            // Menampilkan SweetAlert jika registrasi gagal
                            Swal.fire({
                                icon: "error",
                                title: "Registrasi Gagal!",
                                text: data.message // Pesan kesalahan dari server
                            });
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Kesalahan!",
                            text: "Terjadi kesalahan. Silakan coba lagi."
                        });
                    }
                });
        });
    </script>
</x-layouts>
