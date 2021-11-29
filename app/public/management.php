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
    <title>Management</title>
</head>
<body>
<header>
    <nav>
        <a href="index.php">Home</a>
    </nav>
</header>
<section>
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
                <td><?php echo $post['message'] ?></td>
                <td><?php echo $post['posted_at'] ?></td>
                <td><?php echo $post['ip_address'] ?></td>
                <td class="delete">
                    <form method="GET">
                        <input type="submit" name="id" value="Delete"><a href="script/deletepost.php?id=30"></a>
                    </form>
                </td>
            </tr>
            <?php
        } ?>
    </table>
</section>
</body>
</html>
