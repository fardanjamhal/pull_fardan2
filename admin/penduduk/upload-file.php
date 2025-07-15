<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['datapenduduk'])) {
    $file = $_FILES['datapenduduk'];
    $name = time() . '-' . basename($file['name']);
    $target = __DIR__ . '/uploads/' . $name;

    if (move_uploaded_file($file['tmp_name'], $target)) {
        echo json_encode(['success' => true, 'file' => 'uploads/' . $name]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal mengunggah file.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Permintaan tidak valid.']);
}
