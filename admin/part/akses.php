<?php
session_start();

// Cek apakah user sudah login
if ($_SESSION['lvl'] !== 'Administrator' && $_SESSION['lvl'] !== 'Kepala Desa') {
    header("Location: ../../");
    exit();
}

?>
