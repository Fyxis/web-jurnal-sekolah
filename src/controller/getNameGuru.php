<?php
include("../config/connection.php");
include("../../env.php");

$data = json_decode(file_get_contents("php://input"), true);
$kodeGuru = $data['kode_guru'];

$q_readGuru = "SELECT nama_guru FROM $TB_GURU_NAME WHERE kode_guru = '$kodeGuru'";
$runQuery = mysqli_query($connection, $q_readGuru);
$fetchGuru = mysqli_fetch_assoc($runQuery);

if ($fetchGuru) {
  echo json_encode($fetchGuru); // Return respons json format
} else {
  // Mengembalikan respons kosong jika tidak ditemukan
  echo json_encode("ID Guru tidak ditemukan");
}

// Tutup koneksi
mysqli_close($connection);