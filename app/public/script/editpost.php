<?php
require_once ('../../dbconnection.php');



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "UPDATE posts
            SET name = :name, email = :email, message = :message
            WHERE id = :id";

    if ($stmt = $connection->prepare($sql)) {
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindparam(':message', $message);

        $stmt->execute();
        header("Location: ../management.php");
    }
}