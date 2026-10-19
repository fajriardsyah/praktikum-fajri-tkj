<?php

require_once "../config/koneksi.php";
require_once "../layout/header.php";

$query = mysqli_query(
    $conn,
    "SELECT * FROM buku ORDER BY id_buku DESC"
);

?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold">
            Data Buku
        </h2>

        <p class="text-muted">
            Kelola data buku perpustakaan
        </p>
    </div>

    <a
        href="tambah.php"
        class="btn btn-primary"
    >
        + Tambah Buku
    </a>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                <?php

                $no = 1;

                while ($row = mysqli_fetch_assoc($query)):

                ?>

                    <tr>

                        <td>
                            <?= $no++; ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['kode_buku']); ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['judul']); ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['penulis']); ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['penerbit']); ?>
                        </td>

                        <td>
                            <?= $row['tahun_terbit']; ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['kategori']); ?>
                        </td>

                        <td>
                            <span class="badge bg-primary">
                                <?= $row['stok']; ?>
                            </span>
                        </td>

                        <td>

                            <a
                                href="edit.php?id=<?= $row['id_buku']; ?>"
                                class="btn btn-sm btn-warning"
                            >
                                Edit
                            </a>

                            <a
                                href="hapus.php?id=<?= $row['id_buku']; ?>"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Yakin ingin menghapus buku ini?')"
                            >
                                Hapus
                            </a>

                        </td>

                    </tr>

                <?php endwhile; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php require_once "../layout/footer.php"; ?>