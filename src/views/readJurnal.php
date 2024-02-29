<?php
include("../config/connection.php");
include("../../env.php");
session_start();

$jurnalSelected = $_GET['select_className'];

$q_read_nama = "SELECT * FROM $TB_KELAS_NAME WHERE nama_kelas = '$jurnalSelected'";
$runQueryReadNama = mysqli_query($connection, $q_read_nama);
$resultQueryReadNama = mysqli_fetch_assoc($runQueryReadNama);

$no = 1;
$idKelasSelected = $resultQueryReadNama['id_kelas'];

if (isset($_GET['date-filter'])) {
  $tanggal = $_GET['date-filter'];

  if ($tanggal != null) {
    $q_read_id = "SELECT * FROM $TB_JURNAL_NAME WHERE id_kelas = '$idKelasSelected' AND tanggal = '$tanggal'";
  } else {
    $q_read_id = "SELECT * FROM $TB_JURNAL_NAME WHERE id_kelas = '$idKelasSelected'";
  }
} else {
  $q_read_id = "SELECT * FROM $TB_JURNAL_NAME WHERE id_kelas = '$idKelasSelected'";
}
$runQueryReadId = mysqli_query($connection, $q_read_id);
$resultQueryReadId = mysqli_fetch_all($runQueryReadId, MYSQLI_ASSOC);
?>

<html class="scroll-smooth">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jurnal Kelas
    <?= $jurnalSelected ?>
  </title>
  <link rel="stylesheet" href="../../assets/css/flowbite.css">
  <script src="../../assets/js/tailwind.js"></script>
  <script src="../../assets/js/flowbite.js"></script>
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
      <h1 class="font-semibold text-4xl w-full text-center justify-between" id="data_kelas">
        <?= $jurnalSelected ?>
      </h1>

      <div class="flex flex-row gap-3 justify-between w-80">
        <form class="m-0 w-full" method="get">
          <input type="hidden" name="select_className" value="<?= $_GET['select_className'] ?>">
          <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
          <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
              </svg>
            </div>
            <input onchange="this.form.submit()" onclick="this.showPicker()" max="<?= date("Y-m-d"); ?>" value="<?php if (isset($_GET['date-filter'])) echo $_GET['date-filter'] ?>" type="date" name="date-filter" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Filter by tanggal" required />
          </div>
        </form>
        <?php if ($_SESSION['username'] == $USER_USERNAME && $_SESSION['password'] == $USER_PASSWORD) : ?> <!-- User Login -->
          <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
              <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
            </svg>
          </button>

          <!-- Dropdown menu -->
          <div id="dropdownDotsHorizontal" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
              <a id="btn_changeClass" class="block flex flex-row gap-3 px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-white cursor-pointer">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <path fill="#ffffff" d="M0 168v-16c0-13.3 10.7-24 24-24h360V80c0-21.4 25.9-32 41-17l80 80c9.4 9.4 9.4 24.6 0 33.9l-80 80C410 272 384 261.5 384 240v-48H24c-13.3 0-24-10.7-24-24zm488 152H128v-48c0-21.3-25.9-32.1-41-17l-80 80c-9.4 9.4-9.4 24.6 0 33.9l80 80C102.1 464 128 453.4 128 432v-48h360c13.3 0 24-10.7 24-24v-16c0-13.3-10.7-24-24-24z" />
                </svg>
                Ganti Kelas</a>
              <a id="btn_logOut" class="block flex flex-row gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-500 dark:hover:text-white cursor-pointer">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <path fill="#ef4545" d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z" />
                </svg>
                Keluar</a>
            </ul>
          </div>
        <?php elseif ($_SESSION['username'] == $ADMIN_USERNAME && $_SESSION['password'] == $ADMIN_PASSWORD) : ?> <!-- Admin Login -->
          <div class="flex flex-row gap-3">
            <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
              <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
              </svg>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdownDotsHorizontal" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
              <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                <li>
                  <a id="btn_addJurnal" class="block flex flex-row gap-3 px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white cursor-pointer">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                      <path fill="#e6e6e6" d="M416 208H272V64c0-17.7-14.3-32-32-32h-32c-17.7 0-32 14.3-32 32v144H32c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32h144v144c0 17.7 14.3 32 32 32h32c17.7 0 32-14.3 32-32V304h144c17.7 0 32-14.3 32-32v-32c0-17.7-14.3-32-32-32z" />
                    </svg>
                    Tambahkan Jurnal</a>
                </li>
                <?php if (mysqli_num_rows($runQueryReadId) == 0) : ?>
                  <li class="hidden">
                  <?php else : ?>
                  <li>
                  <?php endif ?>
                  <a id="btn_exportJurnal" class="block flex flex-row gap-3 px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white cursor-pointer">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                      <path fill="#e6e6e6" d="M448 192V77.3c0-8.5-3.4-16.6-9.4-22.6L393.4 9.4c-6-6-14.1-9.4-22.6-9.4H96C78.3 0 64 14.3 64 32v160c-35.4 0-64 28.7-64 64v112c0 8.8 7.2 16 16 16h48v96c0 17.7 14.3 32 32 32h320c17.7 0 32-14.3 32-32v-96h48c8.8 0 16-7.2 16-16V256c0-35.4-28.7-64-64-64zm-64 256H128v-96h256v96zm0-224H128V64h192v48c0 8.8 7.2 16 16 16h48v96zm48 72c-13.3 0-24-10.8-24-24 0-13.3 10.8-24 24-24s24 10.7 24 24c0 13.3-10.8 24-24 24z" />
                    </svg>
                    Cetak Jurnal</a>
                  </li>
                  <li class="hidden">
                    <a id="btn_exportJurnal" class="block flex flex-row gap-3 px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white cursor-pointer">
                      <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="#e6e6e6" d="M448 192V77.3c0-8.5-3.4-16.6-9.4-22.6L393.4 9.4c-6-6-14.1-9.4-22.6-9.4H96C78.3 0 64 14.3 64 32v160c-35.4 0-64 28.7-64 64v112c0 8.8 7.2 16 16 16h48v96c0 17.7 14.3 32 32 32h320c17.7 0 32-14.3 32-32v-96h48c8.8 0 16-7.2 16-16V256c0-35.4-28.7-64-64-64zm-64 256H128v-96h256v96zm0-224H128V64h192v48c0 8.8 7.2 16 16 16h48v96zm48 72c-13.3 0-24-10.8-24-24 0-13.3 10.8-24 24-24s24 10.7 24 24c0 13.3-10.8 24-24 24z" />
                      </svg>
                      Cetak Jurnal</a>
                  </li>
              </ul>
              <div class="py-2">
                <a id="btn_changeClass" class="block flex flex-row gap-3 px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-white cursor-pointer">
                  <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="#ffffff" d="M0 168v-16c0-13.3 10.7-24 24-24h360V80c0-21.4 25.9-32 41-17l80 80c9.4 9.4 9.4 24.6 0 33.9l-80 80C410 272 384 261.5 384 240v-48H24c-13.3 0-24-10.7-24-24zm488 152H128v-48c0-21.3-25.9-32.1-41-17l-80 80c-9.4 9.4-9.4 24.6 0 33.9l80 80C102.1 464 128 453.4 128 432v-48h360c13.3 0 24-10.7 24-24v-16c0-13.3-10.7-24-24-24z" />
                  </svg>
                  Ganti Kelas</a>
                <a id="btn_logOut" class="block flex flex-row gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-500 dark:hover:text-white cursor-pointer">
                  <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="#ef4545" d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z" />
                  </svg>
                  Keluar</a>
              </div>
            </div>
          </div>
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
                <?php if (isset($_POST['submit'])) : ?>
                  <?php
                  $filterDate = $_POST['date-filter'];
                  $queryFilter = "SELECT * FROM $TB_JURNAL_NAME WHERE tanggal ='$filterDate'";
                  $runQueryFilter = mysqli_query($connection, $queryFilter);
                  $fetchSearchFilter = mysqli_fetch_all($runQueryFilter);
                  ?>
                  <?php foreach ($fetchSearchFilter as $row) : ?>
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
                  <?php foreach ($runQueryReadId as $row) : ?>
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
            <input type="date" name="tanggal" id="tanggal" onclick="this.showPicker()" max="<?= Date('Y-m-d') ?>" value="<?= Date('Y-m-d') ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
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
  <?php if ($_SESSION['username'] == $ADMIN_USERNAME && $_SESSION['password'] == $ADMIN_PASSWORD) : ?>
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
                      document.getElementById('nama_guru').classList.add("dark:text-red-500")
                      document.getElementById('nama_guru').classList.remove("dark:text-white")
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

      const headerClick = () => {
        document.getElementById('btn_logOut').addEventListener('click', () => {
          window.location.href = "./authentication.php"
        })
        document.getElementById('btn_exportJurnal').addEventListener('click', () => {
          window.location.href = "../controller/exportExcel.php?kelas=<?= $jurnalSelected ?>"
        })
        document.getElementById('btn_changeClass').addEventListener('click', () => {
          <?php
          session_reset();
          ?>
          window.location.href = "./index.php"
        })
      }

      headerClick()
      generateColumnSiswa()
      modalFunction()
    </script>
  <?php elseif ($_SESSION['username'] == $USER_USERNAME && $_SESSION['password'] == $USER_PASSWORD) : ?>
    <script>
      const userHeaderClick = () => {
        document.getElementById('btn_logOut').addEventListener('click', () => {
          window.location.href = "./authentication.php"
        })
        document.getElementById('btn_changeClass').addEventListener('click', () => {
          <?php
          session_reset();
          ?>
          window.location.href = "./index.php"
        })
      }

      userHeaderClick()
    </script>
  <?php endif ?>
</body>

</html>