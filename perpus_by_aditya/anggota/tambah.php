<?php

require_once "../config/koneksi.php";

if (isset($_POST['simpan'])) {

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
        "INSERT INTO anggota
        (kode_anggota,nama,jenis_kelamin,alamat,no_hp,tanggal_daftar)
        VALUES
        ('$kode','$nama','$jk','$alamat','$no_hp','$tanggal')"
    );

    header("Location: index.php");

    exit;
}

require_once "../layout/header.php";

?>

<h2 class="fw-bold mb-4">
    Tambah Anggota
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
            required
        >

    </div>

    <div class="mb-3">

        <label>Nama</label>

        <input
            type="text"
            name="nama"
            class="form-control"
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

            <option value="">
                -- Pilih --
            </option>

            <option value="Laki-laki">
                Laki-laki
            </option>

            <option value="Perempuan">
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
        ></textarea>

    </div>

    <div class="mb-3">

        <label>No HP</label>

        <input
            type="text"
            name="no_hp"
            class="form-control"
        >

    </div>

    <div class="mb-3">

        <label>Tanggal Daftar</label>

        <input
            type="date"
            name="tanggal_daftar"
            class="form-control"
            value="<?= date('Y-m-d'); ?>"
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