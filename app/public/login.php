<?php
session_start();
include("../dbconnection.php");

if ($_SESSION['loggedin'] == true)
    header("Location: management.php");

else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!isset($_POST['username'], $_POST['password'])) {
        exit("Something went wrong, have you entered both username and password?");
    } else {
        $sql = "SELECT id, username, password 
            FROM users 
            WHERE username=:username
            AND password=:password";

        if ($stmt = $connection->prepare($sql)) {
            $stmt->bindparam(':username', $_POST['username']);
            $stmt->bindparam(':password', $_POST['password']);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                session_regenerate_id();

                $_SESSION['loggedin'] = true;
                $_SESSION['name'] = $_POST['username'];

                header("Location: management.php");
                exit();
                //user will stay logged in to easily switch between pages (and for potential logout feature)
            }
        } else
            echo "Incorrect credentials";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        <?php include '../css/style.css'; ?>
    </style>
    <title>Guestbook | Login</title>
</head>
<body>
<section class="main-container">
    <form method="POST">
        <h2>Login</h2>
        <fieldset class="form-field">
            <label>Username:</label>
            <input placeholder="Enter your username..." type="text" name="username">
        </fieldset>
        <fieldset class="form-field">
            <label>Password:</label>
            <input placeholder="Enter your password.." name="password">
        </fieldset>
        <fieldset class="form-field">
            <label>&nbsp;</label>
            <input type="submit" name="submit" value="Login">
        </fieldset>
    </form>
</section>
</body>
</html>