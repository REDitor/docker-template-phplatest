<html lang="en">
<body>
<?php
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

//echo "Hello $name, you are $age years old";
?>
</body>
</html>