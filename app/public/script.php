<html lang="en">
<body>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$name = $birthdateParam = $age = "";

if (empty($_POST["name"]) || empty($_POST["dob"]))
    echo "Please fill out all fields...";
else {
    $name = $_POST["name"];
    $birthdateParam = $_POST["dob"];
    $birthdate = new DateTime($birthdateParam);
    $now = new DateTime();
    $age = ($now->diff($birthdate))->y;

    echo "Hello $name, you are $age years old";
}
?>
</body>
</html>