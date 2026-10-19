<?php

require_once "../config/koneksi.php";

$id = (int) $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT * FROM peminjaman
         WHERE id_peminjaman=$id"
    )
);

if (!$data) {
    die("Data peminjaman tidak ditemukan.");
}

if ($data['status'] == 'Dikembalikan') {
    header("Location: index.php");
    exit;
}

mysqli_query(
    $conn,
    "UPDATE peminjaman SET
        status='Dikembalikan',
        tanggal_kembali=CURDATE()
     WHERE id_peminjaman=$id"
);

mysqli_query(
    $conn,
    "UPDATE buku SET
        stok = stok + 1
     WHERE id_buku=" . $data['id_buku']
);

header("Location: index.php");

exit;

?>