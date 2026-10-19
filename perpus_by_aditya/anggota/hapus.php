<?php

require_once "../config/koneksi.php";

$id = (int) $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM anggota
     WHERE id_anggota=$id"
);

header("Location: index.php");

exit;

?>