<?php
include_once '../../../../../config/koneksi.php'; // atau sesuaikan path koneksi

// Cek apakah sudah login
if (!isset($_SESSION['lvl'])) {
    header('Location: ../../login.php');
    exit;
}

// Cek level akses
if ($_SESSION['lvl'] == 'Administrator') {
    echo "<script>
        alert('Anda tidak diberi akses ke halaman ini!');
        window.location.href='../../../../dashboard/';
    </script>";
    exit;
}
?>