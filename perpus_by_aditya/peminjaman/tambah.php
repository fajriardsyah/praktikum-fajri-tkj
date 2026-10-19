<?php

require_once "../config/koneksi.php";

if (isset($_POST['simpan'])) {

    $id_anggota = (int) $_POST['id_anggota'];
    $id_buku = (int) $_POST['id_buku'];
    $tanggal = $_POST['tanggal_pinjam'];

    $cek = mysqli_fetch_assoc(
        mysqli_query(
            $conn,
            "SELECT stok FROM buku
             WHERE id_buku=$id_buku"
        )
    );

    if (!$cek || $cek['stok'] <= 0) {

        echo "<script>
            alert('Stok buku habis!');
            window.location='tambah.php';
        </script>";

        exit;
    }

    mysqli_query(
        $conn,
        "INSERT INTO peminjaman
        (id_anggota,id_buku,tanggal_pinjam,status)
        VALUES
        ($id_anggota,$id_buku,'$tanggal','Dipinjam')"
    );

    mysqli_query(
        $conn,
        "UPDATE buku
         SET stok = stok - 1
         WHERE id_buku=$id_buku"
    );

    header("Location: index.php");

    exit;
}

$anggota = mysqli_query(
    $conn,
    "SELECT * FROM anggota ORDER BY nama ASC"
);

$buku = mysqli_query(
    $conn,
    "SELECT * FROM buku
     WHERE stok > 0
     ORDER BY judul ASC"
);

require_once "../layout/header.php";

?>

<h2 class="fw-bold mb-4">
    Peminjaman Buku
</h2>

<div class="card border-0 shadow-sm">

<div class="card-body">

<form method="POST">

    <div class="mb-3">

        <label>Anggota</label>

        <select
            name="id_anggota"
            class="form-select"
            required
        >

            <option value="">
                -- Pilih Anggota --
            </option>

            <?php while ($row = mysqli_fetch_assoc($anggota)): ?>

                <option value="<?= $row['id_anggota']; ?>">

                    <?= htmlspecialchars($row['kode_anggota']); ?>
                    -
                    <?= htmlspecialchars($row['nama']); ?>

                </option>

            <?php endwhile; ?>

        </select>

    </div>

    <div class="mb-3">

        <label>Buku</label>

        <select
            name="id_buku"
            class="form-select"
            required
        >

            <option value="">
                -- Pilih Buku --
            </option>

            <?php while ($row = mysqli_fetch_assoc($buku)): ?>

                <option value="<?= $row['id_buku']; ?>">

                    <?= htmlspecialchars($row['kode_buku']); ?>
                    -
                    <?= htmlspecialchars($row['judul']); ?>
                    (Stok: <?= $row['stok']; ?>)

                </option>

            <?php endwhile; ?>

        </select>

    </div>

    <div class="mb-3">

        <label>Tanggal Pinjam</label>

        <input
            type="date"
            name="tanggal_pinjam"
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
        Simpan Peminjaman
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