<?php

session_start();

require_once "../config/koneksi.php";

$username = mysqli_real_escape_string(
    $conn,
    $_POST['username']
);

$password = md5($_POST['password']);

$query = mysqli_query(
    $conn,
    "SELECT * FROM users
     WHERE username='$username'
     AND password='$password'"
);

$data = mysqli_fetch_assoc($query);

if ($data) {

    $_SESSION['login'] = true;
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['username'] = $data['username'];

    header("Location: ../dashboard.php");
    exit;

} else {

    header("Location: login.php?error=1");
    exit;

}

?>