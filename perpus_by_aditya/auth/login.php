<?php

session_start();

if (isset($_SESSION['login'])) {
    header("Location: ../dashboard.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Perpustakaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

   <link
    rel="stylesheet"
    href="../assets/css/style.css"
>
</head>

<body class="login-page">

<div class="login-card">

    <div class="login-logo">
        📚
    </div>

    <h3>
        Perpustakaan
    </h3>

    <p>
        Kelola koleksi buku dengan lebih mudah
    </p>

    <!-- form login kamu di sini -->

</div>

</body>

<div class="login-card">

    <div class="logo mb-3">
        📚
    </div>

    <h3 class="text-center fw-bold">
        Perpustakaan
    </h3>

    <p class="text-center text-muted mb-4">
        Silakan login untuk melanjutkan
    </p>

    <?php if (isset($_GET['error'])): ?>

        <div class="alert alert-danger">
            Username atau password salah!
        </div>

    <?php endif; ?>

    <form action="proses_login.php" method="POST">

        <div class="mb-3">

            <label class="form-label">
                Username
            </label>

            <input
                type="text"
                name="username"
                class="form-control"
                placeholder="Masukkan username"
                required
            >

        </div>

        <div class="mb-3">

            <label class="form-label">
                Password
            </label>

            <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Masukkan password"
                required
            >

        </div>

        <button
            type="submit"
            class="btn btn-primary w-100"
        >
            Login
        </button>

    </form>

</div>

</body>
</html>