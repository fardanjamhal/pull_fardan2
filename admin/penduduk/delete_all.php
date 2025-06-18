<?php
include('../../config/koneksi.php');

try {
    mysqli_query($connect, "DELETE FROM penduduk");
    header("Location: index.php?pesan=berhasil");
    exit();
} catch (Exception $e) {
    header("Location: index.php?pesan=gagal");
    exit();
}
