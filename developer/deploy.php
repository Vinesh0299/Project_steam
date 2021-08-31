<?php
session_start();

$dev_Id = $_SESSION['Developer_Id'];

$conn = new mysqli('localhost', 'project_steam', 'projectsteam', 'Project_steam');

$name = $_POST['name'];
$install_size = $_POST['install_size'];
$platform = $_POST['platform'];
$ram = $_POST['ram'];
$graphic = $_POST['graphic'];
$release_date = $_POST['release_date'];
$release_date = str_replace('/', '-', $release_date);
date('Y-m-d', $release_date);

$query = '';
$bool_exist = false;

if(!empty($username)) {
    $query = "SELECT Name FROM Games WHERE Name = '$name'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    if($row > 0) {
        $bool_exist = true;
    }
}

if($bool_exist) {
    header("Location: dev_deploy.php?done=3");
} else if(!empty($name) && !empty($platform) && !empty($ram) && !empty($graphic) && !empty($install_size)) {
    $query = "INSERT INTO Games (Developer_Id, Game_name, Install_size, Platform, Ram, Graphic_card, Release_date) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssss", $dev_Id, $name, $install_size, $platform, $ram, $graphic, $release_date);
    $stmt->execute();
    header("Location: dev_deploy.php?done=2");
} else {
    header("Location: dev_deploy.php?done=1");
}

?>