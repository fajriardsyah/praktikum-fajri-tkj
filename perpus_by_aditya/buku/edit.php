<?php

require_once "../config/koneksi.php";

$id = (int) $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT * FROM buku WHERE id_buku=$id"
    )
);

if (!$data) {
    die("Data buku tidak ditemukan");
}

if (isset($_POST['update'])) {

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
        "UPDATE buku SET
        kode_buku='$kode',
        judul='$judul',
        penulis='$penulis',
        penerbit='$penerbit',
        tahun_terbit='$tahun',
        kategori='$kategori',
        stok='$stok'
        WHERE id_buku=$id"
    );

    header("Location: index.php");

    exit;
}

require_once "../layout/header.php";

?>

<h2 class="fw-bold mb-4">
    Edit Buku
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
            value="<?= htmlspecialchars($data['kode_buku']); ?>"
            required
        >

    </div>

    <div class="mb-3">

        <label>Judul</label>

        <input
            type="text"
            name="judul"
            class="form-control"
            value="<?= htmlspecialchars($data['judul']); ?>"
            required
        >

    </div>

    <div class="mb-3">

        <label>Penulis</label>

        <input
            type="text"
            name="penulis"
            class="form-control"
            value="<?= htmlspecialchars($data['penulis']); ?>"
            required
        >

    </div>

    <div class="mb-3">

        <label>Penerbit</label>

        <input
            type="text"
            name="penerbit"
            class="form-control"
            value="<?= htmlspecialchars($data['penerbit']); ?>"
            required
        >

    </div>

    <div class="mb-3">

        <label>Tahun Terbit</label>

        <input
            type="number"
            name="tahun_terbit"
            class="form-control"
            value="<?= $data['tahun_terbit']; ?>"
            required
        >

    </div>

    <div class="mb-3">

        <label>Kategori</label>

        <input
            type="text"
            name="kategori"
            class="form-control"
            value="<?= htmlspecialchars($data['kategori']); ?>"
            required
        >

    </div>

    <div class="mb-3">

        <label>Stok</label>

        <input
            type="number"
            name="stok"
            class="form-control"
            value="<?= $data['stok']; ?>"
            min="0"
            required
        >

    </div>

    <button
        type="submit"
        name="update"
        class="btn btn-primary"
    >
        Update
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