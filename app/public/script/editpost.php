<?php
require_once ('../../dbconnection.php');



if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = $_GET['id'];
    $name = $_GET['name'];
    $email = $_GET['email'];
    $message = $_GET['message'];
    $posted_at = $_GET['posted_at'];
    $ip_address = $_GET['ip_address'];

    $sql = "UPDATE posts
            SET message = :message
            WHERE id = :id";

    if ($stmt = $connection->prepare($sql)) {
        $stmt->bindparam(':message', $message);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header("Location: ../management.php");
    }
}