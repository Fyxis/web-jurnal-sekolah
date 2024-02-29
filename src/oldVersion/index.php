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
  <script src="../../assets/js/tailwind.js"></script>
</head>

<body class="antialiased dark:text-slate-100 bg-white dark:bg-slate-900">
  <div class="h-screen flex items-center justify-center">
    <form action="./readJurnal.php" method="get" class="flex flex-col items-center justify-center gap-2">
      <h1 class="text-4xl font-semibold">
        SELECT CLASS
      </h1>
      <select name="select_className" id="cmb_select-class" class="text-xl w-4/5 text-slate-900 rounded-md px-1" onchange="this.form.submit()">
        <?php
        $q_read = "SELECT * FROM $TB_KELAS_NAME ORDER BY nama_kelas ASC";
        $result = mysqli_query($connection, $q_read);
        ?>
        <?php if (mysqli_num_rows($result) == 0) : ?>
          <option hidden>NO DATA</option>

        <?php else : ?>
          <?php foreach ($result as $row) : ?>

            <option selected disabled hidden>Choose Here</option>
            <option name="className" value="<?= $row['nama_kelas'] ?>">
              <?= $row['nama_kelas'] ?>
            </option>

          <?php endforeach ?>
        <?php endif ?>
      </select>
    </form>
  </div>
</body>

</html>