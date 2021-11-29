<?php
include_once("../../dbconnection.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $id = $_GET['id'];
    $stmt = $connection->prepare("DELETE FROM posts WHERE id = $id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

//include_once("../management.php");