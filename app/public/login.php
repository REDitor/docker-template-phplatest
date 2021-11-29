<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
    header("location: management.php")
//try {
//    //start session
//    session_start();
//
//    //check if user is logged in already
//    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
//        header("location: ../management.php");
//        exit;
//    }
//
//    //include db connection
//    require_once('../dbconnection.php');
//
//    //need these later
//    $username = $password = "";
//    $username_err = $password_err = $login_err = "";
//
//    //process form upon submit
//    if ($_SERVER['REQUEST_METHOD'] == "POST") {
//        if (empty(trim($_POST["username"]))) {
//            $username_err = "Please enter username.";
//        } else {
//            $username = trim($_POST["username"]);
//        }
//
//        if (empty(trim($_POST["password"]))) {
//            $password_err = "Please enter your password.";
//        } else {
//            $password = trim($_POST["password"]);
//        }
//
//        //validate credentials
//        if (empty($username_err) && empty($password_err)) {
//            $sql = "SELECT id, username, password FROM users WHERE username = ?";
//
//            if ($stmt = $connection->prepare($sql)) {
//                $stmt->bindParam("s", $param_username);
//
//                $param_username = trim($_POST["username"]);
//
//                if ($stmt->execute()) {
//                    if ($stmt->rowCount() == 1) {
//                        if ($row = $stmt->fetch()) {
//                            $id = $row['id'];
//                            $username = $row['username'];
//                            $password = $row['password'];
//
//                            session_start();
//
//                            $_SESSION['loggedin'] = true;
//                            $_SESSION['id'] = $id;
//                            $_SESSION['username'] = $username;
//
//                            header("location: management.php");
//                        } else {
//                            $login_err = "Invalid username or password";
//                        }
//                    } else {
//                        echo "Something went wrong, please try again later";
//                    }
//
//                    unset($stmt);
//                }
//            }
//        }
//    }
//} catch (PDOException $e) {
//    echo $e->getMessage();
//}
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
<section id="main-container">
    <form method="POST">
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