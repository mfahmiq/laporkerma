<x-layouts>
    <div class="container-fluid mt-4" style="overflow: hidden;">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">Data Users</h5>
                <div class="d-flex align-items-center">
                    <!-- Tombol + Add -->
                    <a href="/user/create" class="btn btn-success btn-sm small">+ Tambah</a>
                </div>
            </div>

            <!-- Tabel Users -->
            <div class="table-responsive">
                <table id="example" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="small text-center">No</th>
                            <th class="small text-center">Nama</th>
                            <th class="small text-center">Email</th>
                            <th class="small text-center">Unit</th>
                            <th class="small text-center">Role</th>
                            <th class="small text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->mitra->nama_institusi ?? '-' }}</td>
                                <td>{{ $user->role }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('user.edit', $user->id) }}"
                                            class="btn btn-sm btn-warning me-2">
                                            <i class="bi bi-pencil-fill small"></i>
                                        </a>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                            class="d-inline btn-delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger btn-delete"
                                                data-id="{{ $user->id }}">
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

    <script>
        // Konfirmasi penghapusan dengan SweetAlert
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function() {
                const userId = this.getAttribute('data-id');
                const form = this.closest('.btn-delete-form');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data pengguna ini akan dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Hapus",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Permintaan AJAX untuk penghapusan
                        $.ajax({
                            url: '/user/' + userId,
                            method: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                // Tampilkan alert sukses
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: "User telah dihapus.",
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
            });
        });
    </script>
</x-layouts>
