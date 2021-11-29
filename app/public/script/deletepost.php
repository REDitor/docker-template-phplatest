<?php
require_once("../../dbconnection.php");

try {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $sql = "DELETE FROM posts WHERE id = :id";
        $id = $_GET['id'];

        if ($stmt = $connection->prepare($sql)) {
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            header("location: ../management.php");
        }
    }
} catch (PDOException $e) {
    echo $sql . " " . $e->getMessage();
}