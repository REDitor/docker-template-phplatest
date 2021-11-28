<?php
include("../../dbconnection.php");

$stmt = $connection->prepare("DELETE FROM posts WHERE id = :id");

$id = $_POST['id'];

$stmt->bindParam(':id', $id);
$stmt->execute();

include ('../management.php');