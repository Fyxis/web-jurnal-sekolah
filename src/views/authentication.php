<?php
include("../../env.php");
session_start();

if(isset($_POST['submit'])){
  $usernameAuth = $_POST['username'];
  $passwordAuth = $_POST['password'];

  if ($usernameAuth == $ADMIN_USERNAME && $passwordAuth == $ADMIN_PASSWORD || $usernameAuth == $USER_USERNAME && $passwordAuth == $USER_PASSWORD) {
    $_SESSION['username'] = $usernameAuth;
    $_SESSION['password'] = $passwordAuth;
    header("location: ./index.php");
  } else {
    echo "<script>alert('Username atau password salah')</script>";
  }
}
?>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Jurnal</title>
  <script src="../../assets/js/tailwind.js"></script>
</head>
<body class="antialiased dark:text-slate-100 bg-white dark:bg-slate-900">
  <div class="h-screen flex items-center justify-center">
    <form action="" method="post" class="flex flex-col gap-4 w-3/12">
      <h1 class="text-4xl font-semibold mb-2 text-center">
        Login
      </h1>
      <div class="flex flex-col w-full">
        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
        <input type="text" name="username" id="username" autofocus class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
      </div>
      <div class="flex flex-col w-full">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
        <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
      </div>
      <button type="submit" name="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit!
    </form>
  </div>
</body>

</html>