<?php

require_once "config/koneksi.php";
require_once "layout/header.php";

$total_buku = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM buku")
)['total'];

$total_anggota = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM anggota")
)['total'];

$total_dipinjam = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COUNT(*) AS total
         FROM peminjaman
         WHERE status='Dipinjam'"
    )
)['total'];

$total_stok = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COALESCE(SUM(stok),0) AS total FROM buku"
    )
)['total'];

?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold">
            Dashboard
        </h2>

        <p class="text-muted">
            Selamat datang, <?= htmlspecialchars($_SESSION['nama']); ?>
        </p>
    </div>

</div>

<div class="row g-4">

    <div class="col-md-3">

        <div class="card card-stat p-4">

            <h6 class="text-muted">
                Total Buku
            </h6>

            <h2 class="fw-bold">
                <?= $total_buku; ?>
            </h2>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card card-stat p-4">

            <h6 class="text-muted">
                Stok Buku
            </h6>

            <h2 class="fw-bold">
                <?= $total_stok; ?>
            </h2>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card card-stat p-4">

            <h6 class="text-muted">
                Anggota
            </h6>

            <h2 class="fw-bold">
                <?= $total_anggota; ?>
            </h2>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card card-stat p-4">

            <h6 class="text-muted">
                Sedang Dipinjam
            </h6>

            <h2 class="fw-bold">
                <?= $total_dipinjam; ?>
            </h2>

        </div>

    </div>

</div>

<?php require_once "layout/footer.php"; ?>