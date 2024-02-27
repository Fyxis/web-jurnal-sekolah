<?php
include_once("../config/connection.php");
include_once("../../env.php");

$kelas = $_GET['kelas'];

$q_read = "SELECT * FROM $TB_JURNAL_NAME WHERE kelas = '$kelas'";
$runQuery = mysqli_query($connection, $q_read);
$result = mysqli_fetch_all($runQuery, MYSQLI_ASSOC);

$no = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jurnal Kelas</title>
</head>

<body>
  <?php
  $filename = "Jurnal Kelas $kelas " . Date('Y-m-d') . ".xls";
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=$filename");
  ?>

  <center>
    <h1>Jurnal Kelas <?= $kelas ?></h1>
  </center>

  <table border="1">
    <thead>
      <tr>
        <th>No</th>
        <th>Kelas</th>
        <th>Semester</th>
        <th>Tanggal</th>
        <th>Tahun Ajaran</th>
        <th>Jam Ke</th>
        <th>Mata Pelajaran</th>
        <th>Kode Guru</th>
        <th>Nama Guru</th>
        <th>Materi Pembelajaran</th>
        <th>Jumlah Siswa Hadir</th>
        <th>Jumlah Siswa Izin</th>
        <th>Nama Siswa Izin</th>
        <th>Jumlah Siswa Sakit</th>
        <th>Nama Siswa Sakit</th>
        <th>Jumlah Siswa Alpha</th>
        <th>Nama Siswa Alpha</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($result as $row) : ?>
        <tr>
          <td>
            <?= $no++ ?>
          </td>
          <td>
            <?= $row['kelas'] ?>
          </td>
          <td>
            <?= $row['semester'] ?>
          </td>
          <td>
            <?= $row['tanggal'] ?>
          </td>
          <td>
            <?= $row['tahun_ajaran'] ?>
          </td>
          <td>
            <?= $row['jam_ke'] ?>
          </td>
          <td>
            <?= $row['mata_pelajaran'] ?>
          </td>
          <td>
            <?= $row['kode_guru'] ?>
          </td>
          <td>
            <?= $row['nama_guru'] ?>
          </td>
          <td>
            <?= $row['materi_pembelajaran'] ?>
          </td>
          <td>
            <?= $row['jumlah_siswa_hadir'] ?>
          </td>
          <td>
            <?= $row['jumlah_siswa_izin'] ?>
          </td>
          <td>
            <?= $row['nama_siswa_izin'] ?>
          </td>
          <td>
            <?= $row['jumlah_siswa_sakit'] ?>
          </td>
          <td>
            <?= $row['nama_siswa_sakit'] ?>
          </td>
          <td>
            <?= $row['jumlah_siswa_alpha'] ?>
          </td>
          <td>
            <?= $row['nama_siswa_alpha'] ?>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</body>

</html>