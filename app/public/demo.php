<?php
$name = $_GET["name"];
$birthdate = strtotime($_GET["birthdate"]);
echo "Your name is $name and your birthday is $birthdate";
?>