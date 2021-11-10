<!DOCTYPE html>
<html lang="en">
    <?php
    $name = $_GET["name"];
    $birthdateParam = $_GET["birthdate"];
    $birthdate = new DateTime($birthdateParam);
    $now = new DateTime();

    $age = ($now -> diff($birthdate)) -> y;
    echo "Your name is $name and your age is $age";
    ?>
</html>
