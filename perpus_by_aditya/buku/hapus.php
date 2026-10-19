<?php

require_once "../config/koneksi.php";

$id = (int) $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM buku WHERE id_buku=$id"
);

header("Location: index.php");

exit;

?>