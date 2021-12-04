<?php
include("../dbconnection.php");

$sql = "SELECT * FROM posts";
$result = $connection->query($sql);
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
    <title>Guestbook | Management</title>
</head>
<body>
<header>
    <nav>
        <a href="index.php">Home</a>
    </nav>
</header>
<section class="main-container">
    <h2>Posts</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Date</th>
            <th>IP Address</th>
        </tr>
        <?php

        foreach ($result as $post) {
            ?>
            <tr>
                <form method="post">
                    <td><input type="hidden" name="id" value="<?php echo $post['id'] ?>"><?php echo $post['id'] ?></td>
                    <td><input type="text" name="name" value="<?php echo $post['name'] ?>"></td>
                    <td><input type="email" name="email" value="<?php echo $post['email'] ?>"></td>
                    <td><textarea name="message"><?php echo $post['message'] ?></textarea></td>
                    <td><?php echo $post['posted_at'] ?></td>
                    <td><?php echo $post['ip_address'] ?></td>
                    <td>
                        <button formaction="script/editpost.php">Confirm Edit</button>
                    </td>
                    <td>
                        <button formaction="script/deletepost.php">Delete</button>
                    </td>
                </form>
            </tr>
            <?php
        } ?>
    </table>
</section>
</body>
</html>
