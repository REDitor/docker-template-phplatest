<html lang="en">
<body>
<?php
    $name = $_GET["name"];
    $birthdateParam = $_GET["dob"];
    $birthdate = new DateTime($birthdateParam);
    $now = new DateTime();
    $age = ($now->diff($birthdate))->y;
    echo "Hello $name, you are $age years old";
?>
</body>
</html>

