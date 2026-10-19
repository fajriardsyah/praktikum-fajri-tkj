<?php

require_once "../config/koneksi.php";

if (isset($_POST['simpan'])) {

    $kode = mysqli_real_escape_string(
        $conn,
        $_POST['kode_buku']
    );

    $judul = mysqli_real_escape_string(
        $conn,
        $_POST['judul']
    );

    $penulis = mysqli_real_escape_string(
        $conn,
        $_POST['penulis']
    );

    $penerbit = mysqli_real_escape_string(
        $conn,
        $_POST['penerbit']
    );

    $tahun = $_POST['tahun_terbit'];

    $kategori = mysqli_real_escape_string(
        $conn,
        $_POST['kategori']
    );

    $stok = (int) $_POST['stok'];

    mysqli_query(
        $conn,
        "INSERT INTO buku
        (kode_buku, judul, penulis, penerbit, tahun_terbit, kategori, stok)
        VALUES
        ('$kode','$judul','$penulis','$penerbit','$tahun','$kategori','$stok')"
    );

    header("Location: index.php");

    exit;
}

require_once "../layout/header.php";

?>

<h2 class="fw-bold mb-4">
    Tambah Buku
</h2>

<div class="card border-0 shadow-sm">

<div class="card-body">

<form method="POST">

    <div class="mb-3">

        <label>Kode Buku</label>

        <input
            type="text"
            name="kode_buku"
            class="form-control"
            required
        >

    </div>

    <div class="mb-3">

        <label>Judul Buku</label>

        <input
            type="text"
            name="judul"
            class="form-control"
            required
        >

    </div>

    <div class="mb-3">

        <label>Penulis</label>

        <input
            type="text"
            name="penulis"
            class="form-control"
            required
        >

    </div>

    <div class="mb-3">

        <label>Penerbit</label>

        <input
            type="text"
            name="penerbit"
            class="form-control"
            required
        >

    </div>

    <div class="mb-3">

        <label>Tahun Terbit</label>

        <input
            type="number"
            name="tahun_terbit"
            class="form-control"
            min="1900"
            max="2100"
            required
        >

    </div>

    <div class="mb-3">

        <label>Kategori</label>

        <input
            type="text"
            name="kategori"
            class="form-control"
            required
        >

    </div>

    <div class="mb-3">

        <label>Stok</label>

        <input
            type="number"
            name="stok"
            class="form-control"
            min="0"
            required
        >

    </div>

    <button
        type="submit"
        name="simpan"
        class="btn btn-primary"
    >
        Simpan
    </button>

    <a
        href="index.php"
        class="btn btn-secondary"
    >
        Kembali
    </a>

</form>

</div>

</div>

<?php require_once "../layout/footer.php"; ?>