<?php
include("../dbconnection.php");

$sql = "SELECT * FROM posts";
$result = $connection->query($sql);

session_start();
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
    <title>Guestbook | Home</title>
</head>

<body>
<header>
    <nav>
        <a href="login.php">Manage Posts</a>
    </nav>
</header>
<section class="main-container">
    <section id="form-container">
        <h1>Write something in our guestbook!</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $connection->prepare("INSERT INTO posts (posted_at, name, message, ip_address)
                                                            VALUES (now(), :name, :message, :ip_address)");

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $name = $_POST['name'];
            $message = $_POST['message'];

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':ip_address', $_SERVER['REMOTE_ADDR']);

            $stmt->execute();
        } ?>
        <form method="POST">
            <fieldset class="form-field">
                <label>Name:</label>
                <input placeholder="Enter your name..." type="text" name="name">
            </fieldset>
            <fieldset class="form-field">
                <label>Message:</label>
                <textarea placeholder="Enter a message.." name="message"></textarea>
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