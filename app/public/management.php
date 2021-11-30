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
                <td><?php echo $post['id'] ?></td>
                <td><?php echo $post['name'] ?></td>
                <td><?php echo $post['email'] ?></td>
                <td><textarea name="message"><?php echo $post['message']; ?></textarea></td>
                <td><?php echo $post['posted_at'] ?></td>
                <td><?php echo $post['ip_address'] ?></td>
                <td>
                    <form action="script/editpost.php?id=<?php $post['id']; ?>
                                                 &name=<?php $post['name']; ?>
                                                 &email=<?php $post['email']; ?>
                                                 &message=message
                                                 &posted_at=<?php $post['posted_at']; ?>
                                                 &ip_address=<?php $post['ip_address']; ?>"
                          method="post">
                        <input class="button editPost" type="submit" name="submit" value="Confirm Edit">
                    </form>
                </td>
                <td>
                    <form action="script/deletepost.php?id=<?php echo $post['id']; ?>" method="get">
                        <input class="button deletePost" type="submit" name="submit" value="Delete">
                    </form>
                </td>
            </tr>
            <?php
        } ?>
    </table>
</section>
</body>
</html>
