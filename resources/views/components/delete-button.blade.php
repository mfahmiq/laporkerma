<form action="{{ $action }}" method="POST" class="d-inline delete-form">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-danger btn-delete">
        <i class="bi bi-trash"></i> Delete
    </button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                //const form = this.closest('form'); // Mendapatkan form terdekat
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        //form.submit(); // Submit form jika dikonfirmasi
                        window.location.href = deleteUrl;
                    }
                })
            });
        });
    });
</script>
