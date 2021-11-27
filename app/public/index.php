<?php
require_once("../dbconfig.php");

try {
    $connection = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$sql = "SELECT * FROM posts";
$result = $connection->query($sql);
?>

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

<body>
<section id="main-container">
    <section id="form-container">
        <h1>Write something in our guestbook!</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $connection->prepare("INSERT INTO posts (posted_at, name, message, ip_address)
                                                            VALUES (now(), :name, :message, :ip_address)");
            $stmt->bindParam(':name', $_POST['name']);
            $stmt->bindParam(':message', $_POST['message']);
            $stmt->bindParam(':ip_address', $_SERVER['REMOTE_ADDR']);

            $stmt->execute();
        }
        ?>
        <form action="index.php" method="POST">
            <fieldset class="form-field">
                <label>Name:</label>
                <input type="text" name="name">
            </fieldset>
            <fieldset class="form-field">
                <label>Message:</label>
                <textarea name="message"></textarea>
            </fieldset>
            <fieldset class="form-field">
                <label>&nbsp;</label>
                <input type="submit" name="submit" value="Submit">
            </fieldset>
        </form>
    </section>

    <section id="posts-container">
        <h1>Guestbook</h1>
        <?php
        foreach ($result as $post) {

            ?>
            <section class="post">
                <h2 class="post-name"><?php echo $post['name'] ?></h2>
                <p><?php echo nl2br($post['message']) ?></p>
                <p class="post-footer"><?php echo "posted at " . $post['posted_at'] . " from" . $post['ip_address'] ?></p>
            </section>
            <?php
        } ?>
    </section>
</section>
</body>