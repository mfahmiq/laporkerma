<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORKERMA</title>
    <link rel="icon" href="{{ asset('images/logoitgfix.png') }}" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.bootstrap5.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layouts.css') }}">
</head>

<body>
    <div class="wrapper">
        <div class="sidebar close">
            <div class="logo-details">
                <img src="{{ asset('images/logoitgfix.png') }}" alt="Logo" class="logo-img">
                <span class="logo_name">LAPORKERMA</span>
            </div>
            <ul class="nav-links">
                <li>
                    <a href="{{ url('/dashboard') }}">
                        <i class='bx bx-grid-alt'></i>
                        <span class="link_name">Beranda</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="{{ url('/dashboard') }}">Beranda</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('/kerma') }}">
                        <i class="fa-regular fa-handshake"></i>
                        <span class="link_name">Kerjasama</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="{{ url('/kerma') }}">Kerjasama</a></li>
                    </ul>
                </li>
                @if (auth()->user()->isAdmin())
                    <li>
                        <a href="{{ url('/mitra') }}">
                            <i class='bx bx-building'></i>
                            <span class="link_name">Unit</span>
                        </a>
                        <ul class="sub-menu blank">
                            <li><a class="link_name" href="{{ url('/mitra') }}">Unit</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('/user') }}">
                            <i class='bx bx-group'></i>
                            <span class="link_name">User</span>
                        </a>
                        <ul class="sub-menu blank">
                            <li><a class="link_name" href="{{ url('/user') }}">User</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
        <section class="home-section">
            <div class="home-content fixed-header">
                <i class='bx bx-menu'></i>
                <div class="profile-menu" onclick="toggleDropdown()">
                    <div><small>Selamat Datang, {{ auth()->user()->name }}</small></div>
                    <div class="bi bi-chevron-down"></div>
                    <div class="dropdown-menu" id="profileDropdown">
                        <button type="button" class="dropdown-item" id="btn-logout" style="color: white">
                            <i class='bx bx-log-out' style="margin-right: 12px;"></i>Logout
                        </button>
                    </div>
                </div>
            </div>

            <!-- Konten Utama -->
            <div class="content">
                {{ $slot }}
            </div>
        </section>
    </div> <!-- End of wrapper -->

    <footer>
        <div class="footer-content">
            <p>&copy; {{ date('Y') }} Laporkerma. All rights reserved.</p>
        </div>
    </footer>

    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement;
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });

        function toggleDropdown() {
            const dropdownMenu = document.getElementById('profileDropdown');
            dropdownMenu.classList.toggle('show');
        }

        document.addEventListener('click', (event) => {
            const dropdownMenu = document.getElementById('profileDropdown');
            const profileMenu = document.querySelector('.profile-menu');

            if (!profileMenu.contains(event.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        new DataTable('#example');
    </script>
    <script>
        $(document).on('click', '#btn-logout', function() {
            Swal.fire({
                title: "Anda yakin ingin logout?",
                text: "Anda akan keluar dari akun Anda.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, logout!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim permintaan AJAX untuk logout
                    $.ajax({
                        url: '/logout',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}' // Sertakan token CSRF
                        },
                        success: function(response) {
                            // Tampilkan pesan sukses dan alihkan ke halaman login
                            Swal.fire({
                                title: "Berhasil Logout!",
                                text: "Anda telah berhasil logout.",
                                icon: "success"
                            }).then(() => {
                                window.location.href =
                                '/login'; // Alihkan ke halaman login
                            });
                        },
                        error: function(xhr) {
                            // Menangani kesalahan jika logout gagal
                            Swal.fire({
                                title: "Kesalahan!",
                                text: "Terjadi kesalahan. Silakan coba lagi.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
