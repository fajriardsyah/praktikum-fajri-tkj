<?php

require_once "../config/koneksi.php";
require_once "../layout/header.php";

$query = mysqli_query(
    $conn,
    "SELECT * FROM anggota ORDER BY id_anggota DESC"
);

?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold">
            Data Anggota
        </h2>

        <p class="text-muted">
            Kelola anggota perpustakaan
        </p>

    </div>

    <a
        href="tambah.php"
        class="btn btn-primary"
    >
        + Tambah Anggota
    </a>

</div>

<div class="card border-0 shadow-sm">

<div class="card-body">

<div class="table-responsive">

<table class="table table-hover">

<thead>

<tr>
    <th>No</th>
    <th>Kode</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>Alamat</th>
    <th>No HP</th>
    <th>Tanggal Daftar</th>
    <th>Aksi</th>
</tr>

</thead>

<tbody>

<?php

$no = 1;

while ($row = mysqli_fetch_assoc($query)):

?>

<tr>

<td><?= $no++; ?></td>

<td>
<?= htmlspecialchars($row['kode_anggota']); ?>
</td>

<td>
<?= htmlspecialchars($row['nama']); ?>
</td>

<td>
<?= $row['jenis_kelamin']; ?>
</td>

<td>
<?= htmlspecialchars($row['alamat']); ?>
</td>

<td>
<?= htmlspecialchars($row['no_hp']); ?>
</td>

<td>
<?= $row['tanggal_daftar']; ?>
</td>

<td>

<a
    href="edit.php?id=<?= $row['id_anggota']; ?>"
    class="btn btn-sm btn-warning"
>
    Edit
</a>

<a
    href="hapus.php?id=<?= $row['id_anggota']; ?>"
    class="btn btn-sm btn-danger"
    onclick="return confirm('Yakin ingin menghapus anggota ini?')"
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