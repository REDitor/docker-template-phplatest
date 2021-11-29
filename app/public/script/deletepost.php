<?php
include_once("../../dbconnection.php");

try {
    $id = $_GET['id'];
    $sql = "DELETE FROM posts WHERE id =' :id '";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
} catch (PDOException $e) {
    echo $sql . "" . $e->getMessage();
}

//include_once("../management.php");