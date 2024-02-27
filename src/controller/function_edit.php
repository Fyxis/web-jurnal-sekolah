<?php
include("../config/connection.php");
include("../../env.php");

$idJurnal              = $_GET['id_jurnal'];
$tanggal               = $_POST['tanggal'];
$jamKe                 = $_POST['jam_ke'];
$mataPelajaran         = $_POST['mata_pelajaran'];
$kodeGuru              = $_POST['kode_guru'];
$namaGuru              = $_POST['nama_guru'];
$materiPembelajaran    = $_POST['materi_pembelajaran'];
$jumlahSiswaHadir      = $_POST['jumlah_siswa_hadir'];
$jumlahSiswaIzin       = $_POST['jumlah_siswa_izin'];
$jumlahSiswaSakit      = $_POST['jumlah_siswa_sakit'];
$jumlahSiswaAlpha      = $_POST['jumlah_siswa_alpha'];
$namaSiswaIzin         = $_POST['nama_siswa_izin'] ?? [];
$namaSiswaSakit        = $_POST['nama_siswa_sakit'] ?? [];
$namaSiswaAlpha        = $_POST['nama_siswa_alpha'] ?? [];

$nilaiArraySiswaSakit = [];
$nilaiArraySiswaIzin = [];
$nilaiArraySiswaAlpha = [];

foreach ($namaSiswaSakit as $nama) {
  $nilaiArraySiswaSakit[] = $nama;
}
foreach ($namaSiswaIzin as $nama) {
  $nilaiArraySiswaIzin[] = $nama;
}
foreach ($namaSiswaAlpha as $nama) {
  $nilaiArraySiswaAlpha[] = $nama;
}

$nilaiStringSiswaSakit = implode(', ', $nilaiArraySiswaSakit);
$nilaiStringSiswaIzin = implode(', ', $nilaiArraySiswaIzin);
$nilaiStringSiswaAlpha = implode(', ', $nilaiArraySiswaAlpha);

$q_update = "UPDATE tb_jurnal SET
  tanggal = '$tanggal', 
  jam_ke = '$jamKe', 
  mata_pelajaran = '$mataPelajaran', 
  kode_guru = '$kodeGuru', 
  nama_guru = '$namaGuru', 
  materi_pembelajaran = '$materiPembelajaran', 
  jumlah_siswa_hadir = '$jumlahSiswaHadir', 
  jumlah_siswa_sakit = '$jumlahSiswaSakit',
  jumlah_siswa_izin = '$jumlahSiswaIzin', 
  jumlah_siswa_alpha = '$jumlahSiswaAlpha', 
  nama_siswa_sakit = '$nilaiStringSiswaSakit', 
  nama_siswa_izin = '$nilaiStringSiswaIzin', 
  nama_siswa_alpha = '$nilaiStringSiswaAlpha'
  WHERE id_jurnal = '$idJurnal'";
mysqli_query($connection, $q_update);

$q_read = "SELECT * FROM $TB_JURNAL_NAME WHERE id_jurnal = '$idJurnal'";
$result = mysqli_query($connection, $q_read);
$fetch = mysqli_fetch_assoc($result);

$kelas = $fetch['kelas'];
// var_dump($fetch['kelas']);
header("Location: .././views/readJurnal.php?select_className=$kelas");
