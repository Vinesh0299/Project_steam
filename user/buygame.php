<?php
$Game_Id = $_GET['Game_Id'];
session_start();

$User_Id = $_SESSION['User_Id'];

$conn = new mysqli('localhost', 'project_steam', 'projectsteam', 'Project_steam');

$query = "INSERT INTO User_inventory (Game_Id, Game_name, User_Id) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sss", $Game_Id, $_SESSION['Game_name'], $User_Id);
$stmt->execute();

header("Location: userprofile.php?done=10");
?>