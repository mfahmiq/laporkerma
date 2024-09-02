<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORKERMA</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.bootstrap5.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Dropzone CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layouts.css') }}">
</head>

<body>
    <div class="wrapper">
        <div class="sidebar close">
            <div class="logo-details">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-img">
                <span class="logo_name">Laporkerma</span>
            </div>
            <ul class="nav-links">
                <li>
                    <a href="{{ url('/') }}">
                        <i class='bx bx-grid-alt'></i>
                        <span class="link_name">Beranda</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="{{ url('/') }}">Beranda</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('/kerma') }}">
                        <i class="fa-regular fa-handshake"></i>
                        <span class="link_name">Kerjasama</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="{{ url('/profile') }}">Kerjasama</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('/mitra') }}">
                        <i class='bx bx-group'></i>
                        <span class="link_name">Mitra</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="{{ url('/profile') }}">Mitra</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <section class="home-section">
            <div class="home-content fixed-header">
                <i class='bx bx-menu'></i>
                <div class="profile-menu" onclick="toggleDropdown()">
                    <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Profile Picture" id="profile-pic">
                    <div class="dropdown-menu" id="profileDropdown">
                        <div class="profile-details">
                            <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Profile Picture">
                            <div class="name-job">
                                <div class="profile_name">Muhammad Fahmi Assidiq</div>
                            </div>
                        </div>
                        <a href="#" class="dropdown-item">
                            <i class='bx bx-user-circle' style="margin-right: 10px;"></i>
                            Profile Settings
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class='bx bx-log-out' style="margin-right: 10px;"></i>
                            Logout
                        </a>
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
    <script>new DataTable('#example');</script>
</body>

</html>
