<?php
require('../config/connection.php');
require('../../env.php');

$id_jurnal = $_GET['id_jurnal'];

$q_read = "SELECT * FROM $TB_JURNAL_NAME WHERE id_jurnal = '$id_jurnal'";
$runQuery = mysqli_query($connection, $q_read);
$result = mysqli_fetch_array($runQuery);

$kelas = $result['kelas'];
$tanggal = $result['tanggal'];
$jamKe = $result['jam_ke'];
$mataPelajaran = $result['mata_pelajaran'];
$kodeGuru = $result['kode_guru'];
$namaGuru = $result['nama_guru'];
$materiPembelajaran = $result['materi_pembelajaran'];
$jumlahSiswaHadir = $result['jumlah_siswa_hadir'];
$jumlahSiswaIzin = $result['jumlah_siswa_izin'];
$namaSiswaIzin = $result['nama_siswa_izin'];
$jumlahSiswaSakit = $result['jumlah_siswa_sakit'];
$namaSiswaSakit = $result['nama_siswa_sakit'];
$jumlahSiswaAlpha = $result['jumlah_siswa_alpha'];
$namaSiswaAlpha = $result['nama_siswa_alpha'];

$nilaiStringSiswaSakit = explode(',', $namaSiswaSakit);
$nilaiStringSiswaIzin = explode(', ', $namaSiswaIzin);
$nilaiStringSiswaAlpha = explode(', ', $namaSiswaAlpha);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Jurnal Kelas <?= $kelas ?></title>
  <link rel="stylesheet" href="../../assets/css/style.css">
  <script src="../../assets/js/tailwind.js"></script>
</head>

<body class="antialiased dark:text-slate-100 bg-white dark:bg-slate-900 relative top-8 pb-11">
  <div class="h-screen flex justify-center ">
    <form action="../controller/function_edit.php?id_jurnal=<?= $id_jurnal ?>" method="post" class="flex flex-col gap-4 w-full md:w-4/12 px-5 md:px-0">
      <h1 class="text-4xl font-semibold mb-2 text-center">
        EDIT JURNAL KELAS <?= $kelas ?>
      </h1>
      <div class="flex flex-row gap-3">
        <div class="flex flex-col w-full">
          <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
          <input type="date" name="tanggal" id="tanggal" value="<?= $tanggal ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
        </div>
        <div class="flex flex-col w-full">
          <label for="jam_ke" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam Ke</label>
          <input type="text" name="jam_ke" id="jam_ke" value="<?= $jamKe ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
        </div>
      </div>
      <div>
        <label for="mata_pelajaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mata Pelajaran</label>
        <input type="text" name="mata_pelajaran" id="mata_pelajaran" value="<?= $mataPelajaran ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
      </div>
      <div class="flex flex-row gap-3">
        <div class="flex flex-col w-28">
          <label for="kode_guru" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Guru</label>
          <input type="text" name="kode_guru" id="kode_guru" value="<?= $kodeGuru ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
        </div>
        <div class="flex flex-col w-full">
          <label for="nama_guru" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Guru</label>
          <input type="text" name="nama_guru" id="nama_guru" value="<?= $namaGuru ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
        </div>
      </div>
      <div>
        <label for="materi_pembelajaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Materi Pembelajaran</label>
        <input type="text" name="materi_pembelajaran" id="materi_pembelajaran" value="<?= $materiPembelajaran ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
      </div>
      <div class="flex flex-row gap-2">
        <div class="flex flex-col w-full">
          <label for="jumlah_siswa_hadir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Siswa Hadir</label>
          <input type="text" name="jumlah_siswa_hadir" id="jumlah_siswa_hadir" value="<?= $jumlahSiswaHadir ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
        </div>
        <div class="flex flex-col w-full">
          <label for="jumlah_siswa_izin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Siswa Izin</label>
          <input type="text" name="jumlah_siswa_izin" id="jumlah_siswa_izin" value="<?= $jumlahSiswaIzin ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
        </div>

        <div class="flex flex-col w-full">
          <label for="jumlah_siswa_sakit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Siswa Sakit</label>
          <input type="text" name="jumlah_siswa_sakit" id="jumlah_siswa_sakit" value="<?= $jumlahSiswaSakit ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
        </div>
        <div class="flex flex-col w-full">
          <label for="jumlah_siswa_alpha" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Siswa Alpha</label>
          <input type="text" name="jumlah_siswa_alpha" id="jumlah_siswa_alpha" value="<?= $jumlahSiswaAlpha ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
        </div>
      </div>

      <div class="text-4xl font-semibold hidden" id="nama_siswaIzin">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Siswa Izin</label>
        <div id="input_namaSiswaIzin"></div>
      </div>

      <div class="text-4xl font-semibold hidden" id="nama_siswaSakit">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Siswa Sakit</label>
        <div id="input_namaSiswaSakit"></div>
      </div>

      <div class="text-4xl font-semibold hidden" id="nama_siswaAlpha">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Siswa Alpha</label>
        <div id="input_namaSiswaAlpha"></div>
      </div>
      <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit!
    </form>
  </div>
  <script>
    const generateColumnSiswa = () => {
      const
        jumlah_siswa_izin = document.getElementById("jumlah_siswa_izin"),
        jumlah_siswa_sakit = document.getElementById("jumlah_siswa_sakit"),
        jumlah_siswa_alpha = document.getElementById("jumlah_siswa_alpha")

      const
        input_siswa_izin = document.getElementById("input_namaSiswaIzin"),
        input_siswa_sakit = document.getElementById("input_namaSiswaSakit"),
        input_siswa_alpha = document.getElementById("input_namaSiswaAlpha")

      const
        nama_siswa_izin = document.getElementById("nama_siswaIzin"),
        nama_siswa_sakit = document.getElementById("nama_siswaSakit"),
        nama_siswa_alpha = document.getElementById("nama_siswaAlpha")

      // Siswa Izin
      if (jumlah_siswa_izin.value >= 1) {
        nama_siswa_izin.classList.remove('hidden')
        const nilaiSiswaIzin = <?= json_encode($nilaiStringSiswaIzin); ?>;
        const countingSiswaIzin = <?= count($nilaiStringSiswaIzin) ?>;
        for (let i = 0; i < countingSiswaIzin; i++) {
          input_siswa_izin.innerHTML += `
              <input type="text" name="nama_siswa_izin[]" value=${nilaiSiswaIzin[i]} id="nama_siswa_izin" class="bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
            `
        }
      } else {
        input_siswa_izin.innerHTML = ""
        nama_siswa_izin.classList.add('hidden')
      }


      // Siswa Sakit
      if (jumlah_siswa_sakit.value >= 1) {
        nama_siswa_sakit.classList.remove('hidden')
        const nilaiSiswaSakit = <?= json_encode($nilaiStringSiswaSakit); ?>;
        const countingSiswaSakit = <?= count($nilaiStringSiswaSakit) ?>;
        for (let i = 0; i < countingSiswaSakit; i++) {
          input_siswa_sakit.innerHTML += `
              <input type="text" name="nama_siswa_sakit[]" value=${nilaiSiswaSakit[i]} id="nama_siswa_sakit" class="bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
            `
        }
      } else {
        input_siswa_sakit.innerHTML = ""
        nama_siswa_sakit.classList.add('hidden')
      }

      // Siswa Alpha
      if (jumlah_siswa_alpha.value >= 1) {
        nama_siswa_alpha.classList.remove('hidden')
        const nilaiSiswaAlpha = <?= json_encode($nilaiStringSiswaAlpha); ?>;
        const countingSiswaAlpha = <?= count($nilaiStringSiswaAlpha) ?>;
        for (let i = 0; i < countingSiswaAlpha; i++) {
          input_siswa_alpha.innerHTML += `
              <input type="text" name="nama_siswa_alpha[]" value=${nilaiSiswaAlpha[i]} id="nama_siswa_alpha" class="bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
            `
        }
      } else {
        input_siswa_alpha.innerHTML = ""
        nama_siswa_alpha.classList.add('hidden')
      }

      jumlah_siswa_sakit.addEventListener('input', () => {
        const val = jumlah_siswa_sakit.value
        if (val != 0) {
          nama_siswa_sakit.classList.remove('hidden')
          for (let i = 0; i < val; i++) {
            input_siswa_sakit.innerHTML += `
              <input type="text" name="nama_siswa_sakit[]" id="nama_siswa_sakit" class="bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
            `
          }
        } else if (val == 0) {
          input_siswa_sakit.innerHTML = ""
          nama_siswa_sakit.classList.add('hidden')
        }
      })

      jumlah_siswa_alpha.addEventListener('input', () => {
        const val = jumlah_siswa_alpha.value
        if (val != 0) {
          nama_siswa_alpha.classList.remove('hidden')
          for (let i = 0; i < val; i++) {
            input_siswa_alpha.innerHTML += `
              <input type="text" name="nama_siswa_alpha[]" id="nama_siswa_alpha" class="bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
            `
          }
        } else if (val == 0) {
          input_siswa_alpha.innerHTML = ""
          nama_siswa_alpha.classList.add('hidden')
        }
      })

      jumlah_siswa_izin.addEventListener('input', () => {
        const val = jumlah_siswa_izin.value
        if (val != 0) {
          nama_siswa_izin.classList.remove('hidden')
          for (let i = 0; i < val; i++) {
            input_siswa_izin.innerHTML += `
              <input type="text" name="nama_siswa_izin[]" id="nama_siswa_izin" class="bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
            `
          }
        } else if (val == 0) {
          input_siswa_izin.innerHTML = ""
          nama_siswa_izin.classList.add('hidden')
        }
      })
    }
    generateColumnSiswa()
  </script>
</body>

</html>