<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


// Pastikan user sudah login dan level diizinkan
if (!isset($_SESSION['lvl']) || 
    ($_SESSION['lvl'] !== 'Administrator' && $_SESSION['lvl'] !== 'Kepala Desa')) {
    
    // Opsional: redirect ke login dengan pesan
    header("Location: ../../login/index.php");
    exit();
}
?>
