<?php
include("../config/connection.php");
include("../../env.php");
session_start();

$jurnalSelected = $_GET['select_className'];

$q_read_nama = "SELECT * FROM tb_kelas WHERE nama_kelas = '$jurnalSelected'";
$runQueryReadNama = mysqli_query($connection, $q_read_nama);
$resultQueryReadNama = mysqli_fetch_assoc($runQueryReadNama);

$idKelasSelected = $resultQueryReadNama['id_kelas'];
$q_read_id = "SELECT * FROM tb_jurnal WHERE id_kelas = '$idKelasSelected'";
$runQueryReadId = mysqli_query($connection, $q_read_id);

$resultQueryReadId = mysqli_fetch_all($runQueryReadId, MYSQLI_ASSOC);
$no = 1;
?>

<html class="scroll-smooth">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jurnal Kelas
    <?= $jurnalSelected ?>
  </title>
  <link rel="stylesheet" href="../../assets/css/style.css">
  <script src="../../assets/js/tailwind.js"></script>
  <style>
    ::-webkit-scrollbar {
      width: 10px;
    }

    ::-webkit-scrollbar-track {
      background: #E2E8F0;
    }

    ::-webkit-scrollbar-thumb {
      background: #94A3B8;
      border-radius: 50px;
    }

    input::placeholder {
      font-style: italic;
    }
  </style>
</head>

<body class="antialiased text-slate-500 dark:text-slate-400 bg-white dark:bg-slate-900">
  <div class="m-5 z-10">
    <div class="flex justify-between">
      <h1 class="font-semibold text-4xl ml-auto mr-auto" id="data_kelas">
        <?= $jurnalSelected ?>
      </h1>
      <?php if ($_SESSION['username'] == $USER_USERNAME && $_SESSION['password'] == $USER_PASSWORD) : ?> <!-- User Login -->
        <div class="flex flex-row gap-3 hidden">
        <?php elseif ($_SESSION['username'] == $ADMIN_USERNAME && $_SESSION['password'] == $ADMIN_PASSWORD) : ?> <!-- Admin Login -->
          <div class="flex flex-row gap-3">
            <?php if (mysqli_num_rows($runQueryReadId) == 0) : ?>
              <button class=" px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm hover:bg-sky-700" id="btn_addJurnal"><span>+</span> Tambahkan Jurnal</button>
            <?php else : ?>
              <button class=" px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm hover:bg-sky-700" id="btn_addJurnal"><span>+</span> Tambahkan Jurnal</button>
              <a href="../controller/exportExcel.php?kelas=<?= $jurnalSelected ?>" class=" px-4 py-2 font-semibold text-sm bg-amber-600 text-white rounded-full shadow-sm" id="btn_printJurnal"><span>+</span> Cetak Jurnal</a>
            <?php endif ?>
          <?php endif ?>
          </div>
        </div>
        <div class="not-prose bg-slate-50 rounded-xl overflow-hidden dark:bg-slate-800/25 mt-5" id="contentPrint">
          <div class=" rounded-xl overflow-auto snap-mandatory snap-x">
            <div class="shadow-sm overflow-x-auto my-8">
              <table class="border-collapse table-auto w-full text-sm whitespace-nowrap" id="table_jurnal">
                <thead>
                  <tr>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pl-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">No</th>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pl-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Tanggal</th>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pl-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Jam Ke</th>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pl-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Mata Pelajaran</th>
                    <?php if ($_SESSION['username'] == $USER_USERNAME && $_SESSION['password'] == $USER_PASSWORD) : ?> <!-- User Login -->
                      <th class="border-b dark:border-slate-600 font-medium p-4 pl-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left hidden">Kode Guru</th>
                    <?php elseif ($_SESSION['username'] == $ADMIN_USERNAME && $_SESSION['password'] == $ADMIN_PASSWORD) : ?> <!-- Admin Login -->
                      <th class="border-b dark:border-slate-600 font-medium p-4 pl-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Kode Guru</th>
                    <?php endif ?>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pl-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Nama Guru</th>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pl-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Materi Pembelajaran</th>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pl-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Jumlah Siswa Hadir</th>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pl-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Jumlah Siswa Izin</th>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pl-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Nama Siswa Izin</th>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pl-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Jumlah Siswa Sakit</th>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pl-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Nama Siswa Sakit</th>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pl-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Jumlah Siswa Alpha</th>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pl-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Nama Siswa Alpha</th>
                  </tr>
                </thead>

                <tbody class="bg-white dark:bg-slate-800">
                  <?php if (mysqli_num_rows($runQueryReadId) == 0) : ?>
                    <tr class="fs-semibold contents text-center overflow-hidden">
                      <td colspan="14" class="text-2xl font-semibold overflow-hidden">Data Jurnal Kelas <?= $jurnalSelected ?> Belum Diisi!</td>
                    </tr>
                  <?php else : ?>
                    <?php foreach ($resultQueryReadId as $row) : ?>
                      <?php if ($_SESSION['username'] == "user" && $_SESSION['password'] == "user3321") : ?>
                        <tr class="hover:bg-sky-950 cursor-pointer">
                        <?php elseif ($_SESSION['username'] == "admin" && $_SESSION['password'] == "admin1233") : ?>
                        <tr class="hover:bg-sky-950 cursor-pointer" onclick="window.location.href = './edit.php?id_jurnal=<?= $row['id_jurnal'] ?>'">
                        <?php endif ?>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400" id="tb_body_nomor"><?= $no++ ?></td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400" id="tb_body_tanggal"><?= $row['tanggal'] ?></td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400" id="tb_body_jamKe"><?= $row['jam_ke'] ?></td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400" id="tb_body_mataPelajaran"><?= $row['mata_pelajaran'] ?></td>
                        <?php if ($_SESSION['username'] == $USER_USERNAME && $_SESSION['password'] == $USER_PASSWORD) : ?> <!-- User Login -->
                          <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400 hidden" id="tb_body_kodeGuru"><?= $row['kode_guru'] ?></td>
                        <?php elseif ($_SESSION['username'] == $ADMIN_USERNAME && $_SESSION['password'] == $ADMIN_PASSWORD) : ?> <!-- Admin Login -->
                          <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400" id="tb_body_kodeGuru"><?= $row['kode_guru'] ?></td>
                        <?php endif ?>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400" id="tb_body_NamaGuru"><?= $row['nama_guru'] ?></td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400" id="tb_body_materiPembelajaran"><?= $row['materi_pembelajaran'] ?></td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400" id="tb_body_jumlahSiswaHadir"><?= $row['jumlah_siswa_hadir'] ?></td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400" id="tb_body_jumlahSiswaIzin"><?= $row['jumlah_siswa_izin'] ?></td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400" id="tb_body_namaSiswaIzin"><?= $row['nama_siswa_izin'] ?></td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400" id="tb_body_jumlahSiswaSakit"><?= $row['jumlah_siswa_sakit'] ?></td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400" id="tb_body_namaSiswaSakit"><?= $row['nama_siswa_sakit'] ?></td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400" id="tb_body_jumlahSiswaAlpha"><?= $row['jumlah_siswa_alpha'] ?></td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400" id="tb_body_namaSiswaAlpha"><?= $row['nama_siswa_alpha'] ?></td>
                        </tr>
                      <?php endforeach ?>
                    <?php endif ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>

    <div class="h-screen flex items-center justify-center z-50 absolute w-full top-0 hidden bg-black bg-opacity-50 justify-center" id="modalAddJurnal">
      <div class="w-full h-fit max-w-lg p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700 absolute top-16">
        <form class="space-y-5" id="form_add" action="../controller/function_add.php" method="post" onsubmit="return formValidate()">
          <div class="flex flex-row justify-between">
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">Tambahkan Jurnal</h5>
            <button type="button" class="rounded-md inline-flex items-center justify-center text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" id="btnCloseModal">
              <span class="sr-only">Close menu</span>
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>

          <div>
            <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
            <input type="text" name="kelas" id="kelas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" readonly value="<?= $resultQueryReadNama['nama_kelas'] ?>" />
          </div>

          <div class="flex flex-row gap-2">
            <div class="flex flex-col w-full">
              <label for="tahun_ajaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Ajaran</label>
              <select name="tahun_ajaran" required id="cmb_selectTahunAjaran" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                <option selected disabled hidden id="default_select">Choose Here!</option>
                <?php for ($i = date('Y'); 2000 < $i; $i--) : ?>
                  <option value="<?= $i . " / " . $i + 1; ?>">
                    <?= $i . " / " . $i + 1; ?>
                  </option>
                <?php endfor ?>
              </select>
            </div>
            <div class="flex flex-col w-full">
              <label for="semester" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester</label>
              <select name="semester" id="cmb_selectSemester" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                <option selected disabled hidden id="default_select">Choose Here!</option>
                <option value="1">1</option>
                <option value="2">2</option>
              </select>
            </div>
            <div class="flex flex-col w-full">
              <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
              <input type="date" name="tanggal" id="tanggal" value="<?= Date('Y-m-d') ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
            </div>
          </div>

          <div>

          </div>

          <div class="flex flex-row gap-2 w-30">
            <div class="flex flex-col w-28">
              <label for="jam_ke" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam Ke</label>
              <input type="text" autocomplete="off" placeholder="ex: 1- 3" onkeypress="return validateOnlyNumber(event)" name="jam_ke" id="jam_ke" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
            </div>
            <div class="flex flex-col w-full">
              <label for="mata_pelajaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mata Pelajaran</label>
              <input type="text" autocomplete="off" placeholder="ex: Matematika" oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1)" name="mata_pelajaran" id="mata_pelajaran" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
            </div>
          </div>

          <div class="flex flex-row gap-2">
            <div class="flex flex-col w-28">
              <label for="kode_guru" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Guru</label>
              <input type="text" autocomplete="off" placeholder="ex: 73" onkeypress="return validateOnlyNumber(event)" name="kode_guru" id="kode_guru" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
            </div>
            <div class="flex flex-col w-full">
              <label for="nama_guru" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Guru</label>
              <input type="text" autocomplete="off" placeholder="Generate by automatically from teacher code" name="nama_guru" id="nama_guru" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-red-500" required readonly />
            </div>
          </div>
          <div>
            <label for="materi_pembelajaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Materi Pembelajaran</label>
            <input type="text" autocomplete="off" placeholder="ex: Pengenalan Fungsi dan Integral" oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1)" name="materi_pembelajaran" id="materi_pembelajaran" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
          </div>
          <div class="flex flex-row gap-2">
            <div class="flex flex-col w-full">
              <label for="jumlah_siswa_hadir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Siswa Hadir</label>
              <input type="text" autocomplete="off" onkeypress="return validateOnlyNumber(event)" name="jumlah_siswa_hadir" id="jumlah_siswa_hadir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
            </div>
            <div class="flex flex-col w-full">
              <label for="jumlah_siswa_izin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Siswa Izin</label>
              <input type="text" autocomplete="off" onkeypress="return validateOnlyNumber(event)" name="jumlah_siswa_izin" id="jumlah_siswa_izin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
            </div>

            <div class="flex flex-col w-full">
              <label for="jumlah_siswa_sakit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Siswa Sakit</label>
              <input type="text" autocomplete="off" onkeypress="return validateOnlyNumber(event)" name="jumlah_siswa_sakit" id="jumlah_siswa_sakit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
            </div>
            <div class="flex flex-col w-full">
              <label for="jumlah_siswa_alpha" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Siswa Alpha</label>
              <input type="text" autocomplete="off" onkeypress="return validateOnlyNumber(event)" name="jumlah_siswa_alpha" id="jumlah_siswa_alpha" class="bg-gray-50 border border-gray-300 number-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
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
          </button>
        </form>
      </div>
    </div>

    <script src="../../assets/js/logic.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/exceljs/4.3.0/exceljs.min.js"></script>

    <script>
      const validateOnlyNumber = (evt) => {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
          return false;
        }
        return true;
      }

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

        jumlah_siswa_sakit.addEventListener('input', () => {
          const val = jumlah_siswa_sakit.value
          if (val != 0) {
            nama_siswa_sakit.classList.remove('hidden')
            for (let i = 0; i < val; i++) {
              input_siswa_sakit.innerHTML += `
              <input type="text" name="nama_siswa_sakit[]" oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1)" autocomplete="off" id="nama_siswa_sakit" class="bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
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
              <input type="text" name="nama_siswa_alpha[]" oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1)" autocomplete="off" id="nama_siswa_alpha" class="bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
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
              <input type="text" name="nama_siswa_izin[]" oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1)" autocomplete="off" id="nama_siswa_izin" class="bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
            `
            }
          } else if (val == 0) {
            input_siswa_izin.innerHTML = ""
            nama_siswa_izin.classList.add('hidden')
          }
        })
      }

      const modalFunction = () => {
        const
          openModalBtn = document.getElementById('btn_addJurnal'),
          modal = document.getElementById('modalAddJurnal'),
          closeModalBtn = document.getElementById('btnCloseModal'),
          bodyElement = document.body

        openModalBtn.addEventListener('click', () => {
          modal.classList.remove('hidden');
          modal.classList.add('overflow-auto')
          bodyElement.classList.add('overflow-hidden')
        });

        closeModalBtn.addEventListener('click', () => {
          modal.classList.add('hidden')
          modal.classList.remove('overflow-auto')
          bodyElement.classList.remove('overflow-hidden')
          bodyElement.classList.add('overflow-auto')
        })

        var input = document.getElementById("jam_ke");
        input.addEventListener('input', () => {
          var defaultValue = " - ";
          if (input.value.length == 1 || input.value.length == 1) {
            setTimeout(() => {
              input.value += defaultValue
            }, 1000)
          }
        })
      }

      document.getElementById('kode_guru').addEventListener('input', function() {
        if (!this.value) {
          document.getElementById('nama_guru').value = ""
        } else {
          document.getElementById('nama_guru').classList.add("dark:text-red-500")
          document.getElementById('nama_guru').classList.remove("dark:text-white")
          const kodeGuru = this.value; // Get value Kode Guru
          fetch('../controller/getNameGuru.php', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
              },
              body: JSON.stringify({
                kode_guru: kodeGuru
              })
            })
            .then(response => {
              if (!response.ok) {
                throw new Error('Network response was not ok');
              }
              return response.text(); // Change respons to text
            })
            .then(data => {
              try {
                const parsedData = JSON.parse(data); // Change text to json
                setTimeout(() => {
                  document.getElementById('nama_guru').value = "Loading..."
                  setTimeout(() => {
                    document.getElementById('nama_guru').classList.remove("dark:text-red-500")
                    document.getElementById('nama_guru').classList.add("dark:text-white")
                    document.getElementById('nama_guru').value = parsedData.nama_guru;
                    if (document.getElementById('nama_guru').value == "undefined") {
                      document.getElementById('nama_guru').value = "ID Guru tidak ditemukan";
                    }
                  }, 1000)
                }, 1)
              } catch (error) {
                console.error('Error parsing JSON:', error);
              }
            })
            .catch(error => {
              console.error('Fetch error:', error);
            });
        }
      });

      const formValidate = () => {
        const
          selectTahunAjaran = document.getElementById("cmb_selectTahunAjaran"),
          selectSemester = document.getElementById("cmb_selectSemester"),
          optionDefault = document.getElementById("default_select").value

        if (selectTahunAjaran.value != optionDefault && selectSemester.value !== optionDefault) {
          return true
        } else {
          alert("Silahkan memilih tahun ajaran atau semester")
          return false
        }
      }

      generateColumnSiswa()
      modalFunction()
    </script>
</body>

</html>