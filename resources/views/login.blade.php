<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-sm rounded-3" style="max-width: 500px; width: 100%;">
        <div class="bg-primary text-white p-4 d-flex align-items-center rounded-top">
            <div>
                <h4>Selamat Datang !</h4>
                <p>Masuk untuk menggunakan aplikasi</p>
            </div>
            <img src="/assets/auth-login-9f5bb747.svg" alt="Background" class="ms-auto" style="width: 80px; height: auto;">
        </div>
        <a href="#" class="d-flex align-items-center p-4 text-decoration-none text-dark">
            <img src="/assets/logo-1f0ee304.png" alt="Laporkerma Logo" class="me-2" style="width: 40px; height: 40px;">
            <p class="mb-0 fs-5 fw-bold">LAPORKERMA</p>
        </a>
        <div class="p-4">
            <form>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                            </svg>
                        </span>
                        <input type="text" id="username" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                                <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/>
                            </svg>
                        </span>
                        <input type="password" id="password" class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-4 rounded-2">Masuk</button>
            </form>
        </div>
    </div>

    <!-- Tambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
