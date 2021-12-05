<?php
require __DIR__ . '/../../controllers/articlecontroller.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
<section class="main-container">
    <h1>Article Blog</h1>
    <?php
    foreach ($articles as $article) { ?>
        <section class="article">
            <h3><?php echo $article['id'] . ". " . $article['title']?></h3>
            <p><?php echo nl2br($article['content']) ?></p>
            <footer><?php echo "Author: " . $article['author'] . "   Date: " . $article['datetime'] ?></footer>
        </section>
        <?php
    }
    ?>
</section>
</body>
</html>
