<?php
require_once("dbconfig.php");

try {
    $connection = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$sql = "SELECT * FROM posts";
$result = $connection->query($sql);

//foreach ($result as $row) {
//    echo $row['id'];
//    echo $row['name'];
//    echo $row['message'];
//    echo $row['ip_address'];
//    echo $row['posted_at'];
//}
//?>

    <!doctype html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <style>
            <?php include '../css/style.css'; ?>
        </style>
        <title>Guestbook</title>
    </head>
    <section class="container">
    <h1>Guestbook</h1>
<?php
foreach ($result as $post) {
    ?>
    <section class="post">
        <h2 class="post-name"><?php echo $post['name'] ?></h2>
        <p><?php echo $post['message'] ?></p>
        <p class="post-footer"><?php echo "posted at " . $post['posted_at'] . " from" . $post['ip_address'] ?></p>
    </section>
    <?php
}?>
</section>