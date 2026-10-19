<?php

require_once "../config/koneksi.php";

$id = (int) $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT * FROM anggota
         WHERE id_anggota=$id"
    )
);

if (!$data) {
    die("Data anggota tidak ditemukan");
}

if (isset($_POST['update'])) {

    $kode = mysqli_real_escape_string(
        $conn,
        $_POST['kode_anggota']
    );

    $nama = mysqli_real_escape_string(
        $conn,
        $_POST['nama']
    );

    $jk = $_POST['jenis_kelamin'];

    $alamat = mysqli_real_escape_string(
        $conn,
        $_POST['alamat']
    );

    $no_hp = mysqli_real_escape_string(
        $conn,
        $_POST['no_hp']
    );

    $tanggal = $_POST['tanggal_daftar'];

    mysqli_query(
        $conn,
        "UPDATE anggota SET
        kode_anggota='$kode',
        nama='$nama',
        jenis_kelamin='$jk',
        alamat='$alamat',
        no_hp='$no_hp',
        tanggal_daftar='$tanggal'
        WHERE id_anggota=$id"
    );

    header("Location: index.php");

    exit;
}

require_once "../layout/header.php";

?>

<h2 class="fw-bold mb-4">
    Edit Anggota
</h2>

<div class="card border-0 shadow-sm">

<div class="card-body">

<form method="POST">

    <div class="mb-3">

        <label>Kode Anggota</label>

        <input
            type="text"
            name="kode_anggota"
            class="form-control"
            value="<?= htmlspecialchars($data['kode_anggota']); ?>"
            required
        >

    </div>

    <div class="mb-3">

        <label>Nama</label>

        <input
            type="text"
            name="nama"
            class="form-control"
            value="<?= htmlspecialchars($data['nama']); ?>"
            required
        >

    </div>

    <div class="mb-3">

        <label>Jenis Kelamin</label>

        <select
            name="jenis_kelamin"
            class="form-select"
            required
        >

            <option value="Laki-laki"
                <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'selected' : ''; ?>>
                Laki-laki
            </option>

            <option value="Perempuan"
                <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>
                Perempuan
            </option>

        </select>

    </div>

    <div class="mb-3">

        <label>Alamat</label>

        <textarea
            name="alamat"
            class="form-control"
            rows="3"
        ><?= htmlspecialchars($data['alamat']); ?></textarea>

    </div>

    <div class="mb-3">

        <label>No HP</label>

        <input
            type="text"
            name="no_hp"
            class="form-control"
            value="<?= htmlspecialchars($data['no_hp']); ?>"
        >

    </div>

    <div class="mb-3">

        <label>Tanggal Daftar</label>

        <input
            type="date"
            name="tanggal_daftar"
            class="form-control"
            value="<?= $data['tanggal_daftar']; ?>"
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