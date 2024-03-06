<?php
include("../config/connection.php");
include("../../env.php");

$kelas                 = $_POST['kelas'];
$semester              = $_POST['semester'];
$tanggal               = $_POST['tanggal'];
$tahunAjaran           = $_POST['tahun_ajaran'];
$jamKe                 = $_POST['jam_ke'];
$mataPembelajaran      = $_POST['mata_pelajaran'];
$kodeGuru              = $_POST['kode_guru'];
$namaGuru              = $_POST['nama_guru'];
$materiPembelajaran    = $_POST['materi_pembelajaran'];
$jumlahSiswaHadir      = $_POST['jumlah_siswa_hadir'];
$jumlahSiswaIzin       = $_POST['jumlah_siswa_izin'] ?? 0;
$jumlahSiswaSakit      = $_POST['jumlah_siswa_sakit'] ?? 0;
$jumlahSiswaAlpha      = $_POST['jumlah_siswa_alpha'] ?? 0;
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

$q_read_nama = "SELECT * FROM {$TB_KELAS_NAME} WHERE nama_kelas = '$kelas'";
$runQueryNama = mysqli_query($connection, $q_read_nama);
$resultQueryNama = mysqli_fetch_assoc($runQueryNama);

$idKelas = $resultQueryNama['id_kelas'];

$q_insert = "INSERT INTO $TB_JURNAL_NAME VALUES (
  null,
  '$idKelas',
  '$kelas', 
  '$semester', 
  '$tanggal', 
  '$tahunAjaran', 
  '$jamKe', 
  '$mataPembelajaran', 
  '$kodeGuru', 
  '$namaGuru', 
  '$materiPembelajaran', 
  '$jumlahSiswaHadir', 
  '$jumlahSiswaSakit',
  '$jumlahSiswaIzin', 
  '$jumlahSiswaAlpha', 
  '$nilaiStringSiswaSakit', 
  '$nilaiStringSiswaIzin', 
  '$nilaiStringSiswaAlpha'
)";
mysqli_query($connection, $q_insert);
header("Location: .././views/readJurnal.php?select_className=$kelas");

?>