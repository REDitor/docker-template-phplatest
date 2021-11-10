<?php
ini_set('display_errors');
ini_set('display_startup_errors');
error_reporting(E_ALL);

$name = $_GET["name"];
$birthdate = strtotime($_GET["birthdate"]);
echo "Your name is $name and your birthday is $birthdate";
?>