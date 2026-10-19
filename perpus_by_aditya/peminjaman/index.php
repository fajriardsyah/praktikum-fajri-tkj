<?php

require_once "../config/koneksi.php";
require_once "../layout/header.php";

$query = mysqli_query(
    $conn,
    "SELECT
        peminjaman.*,
        anggota.nama,
        anggota.kode_anggota,
        buku.judul,
        buku.kode_buku
     FROM peminjaman
     INNER JOIN anggota
        ON peminjaman.id_anggota = anggota.id_anggota
     INNER JOIN buku
        ON peminjaman.id_buku = buku.id_buku
     ORDER BY peminjaman.id_peminjaman DESC"
);

?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold">
            Peminjaman Buku
        </h2>

        <p class="text-muted">
            Kelola transaksi peminjaman dan pengembalian
        </p>

    </div>

    <a
        href="tambah.php"
        class="btn btn-primary"
    >
        + Peminjaman Baru
    </a>

</div>

<div class="card border-0 shadow-sm">

<div class="card-body">

<div class="table-responsive">

<table class="table table-hover">

<thead>

<tr>

<th>No</th>
<th>Anggota</th>
<th>Buku</th>
<th>Tanggal Pinjam</th>
<th>Tanggal Kembali</th>
<th>Status</th>
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
<?= htmlspecialchars($row['nama']); ?>
</td>

<td>
<?= htmlspecialchars($row['judul']); ?>
</td>

<td>
<?= $row['tanggal_pinjam']; ?>
</td>

<td>
<?= $row['tanggal_kembali'] ?? '-'; ?>
</td>

<td>

<?php if ($row['status'] == 'Dipinjam'): ?>

<span class="badge bg-warning text-dark">
    Dipinjam
</span>

<?php else: ?>

<span class="badge bg-success">
    Dikembalikan
</span>

<?php endif; ?>

</td>

<td>

<?php if ($row['status'] == 'Dipinjam'): ?>

<a
    href="kembali.php?id=<?= $row['id_peminjaman']; ?>"
    class="btn btn-sm btn-success"
    onclick="return confirm('Konfirmasi pengembalian buku?')"
>
    Kembalikan
</a>

<?php else: ?>

<span class="text-muted">
    Selesai
</span>

<?php endif; ?>

</td>

</tr>

<?php endwhile; ?>

</tbody>

</table>

</div>

</div>

</div>

<?php require_once "../layout/footer.php"; ?>