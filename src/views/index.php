<?php
include("../config/connection.php");
include("../../env.php");

session_start();
?>

<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jurnal Sekolah</title>
  <link rel="stylesheet" href="../../assets/css/flowbite.css">
  <script src="../../assets/js/tailwind.js"></script>
  <script src="../../assets/js/flowbite.js"></script>
</head>

<body class="antialiased dark:text-slate-100 bg-white dark:bg-slate-900">
  <div class="h-screen flex items-center justify-center">
    <div class="flex flex-col items-center justify-center gap-2">
      <h1 class="text-4xl font-semibold">
        SELECT CLASS
      </h1>

      <button id="dropdownButton" data-dropdown-toggle="dropdownList" class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        -- Choose Here --
        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
        </svg>
      </button>

      <div id="dropdownList" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
        <?php
        $q_read = "SELECT * FROM $TB_KELAS_NAME ORDER BY nama_kelas ASC";
        $result = mysqli_query($connection, $q_read);
        ?>
        <?php if (mysqli_num_rows($result) == 0) : ?>
          <ul class="py-2 text-sm overflow-auto h-48 text-gray-700 dark:text-gray-200 hidden" aria-labelledby="dropdownButton">
          <?php else : ?>
            <ul class="py-2 text-sm overflow-auto h-72 text-gray-700 dark:text-gray-200" aria-labelledby="dropdownButton">
              <?php foreach ($result as $row) : ?>
                <li>
                  <a href="./readJurnal.php?select_className=<?= $row['nama_kelas'] ?>" class="block px-4 py-2 text-lg hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><?= $row['nama_kelas'] ?></a>
                </li>
              <?php endforeach ?>
            <?php endif ?>
            </ul>
      </div>
    </div>
  </div>
</body>

</html>