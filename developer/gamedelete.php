<?php
$Game_Id = $_GET['Game_Id'];
session_start();

$Developer_Id = $_SESSION['Developer_Id'];

$conn = new mysqli('localhost', 'project_steam', 'projectsteam', 'Project_steam');

$query = "DELETE FROM Games WHERE Game_Id = '$Game_Id'";
$stmt = $conn->prepare($query);
$stmt->execute();

header("Location: dev_profile.php?done=10");
?>