<?php
require_once ('../../dbconnection.php');

$id = $_GET['id'];
$name = $_GET['name'];
$email = $_GET['email'];
$message = $_GET['message'];
$posted_at = $_GET['posted_at'];
$ip_address = $_GET['ip_address'];

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $sql = "UPDATE posts
            SET message = :message
            WHERE id = $id";

    if ($stmt = $connection->prepare($sql)) {
        $stmt->bindparam(':message', $message);
        header("Location: ../management.php");
    }
}