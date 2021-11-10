<html lang="en">
<body>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$name = $birthdateParam = $age = "";

if (empty($_POST["name"]))
    echo "Name is required...";
else
    $name = $_POST["name"];
if (empty($_POST["dob"]))
    echo "Select a birth date...";
else {
    $birthdateParam = $_POST["dob"];
    $birthdate = new DateTime($birthdateParam);
    $now = new DateTime();
    $age = ($now->diff($birthdate))->y;
}

echo "Hello $name, you are $age years old";
?>
</body>
</html>