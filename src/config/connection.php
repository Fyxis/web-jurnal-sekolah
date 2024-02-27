<?php
include("./../../env.php");

$hostname = $DB_HOSTNAME;
$username = $DB_USERNAME;
$password = $DB_PASSWORD;
$database = $DB_DATABASE;

$connection = mysqli_connect($hostname, $username, $password, $database);
