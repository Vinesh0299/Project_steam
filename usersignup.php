<?php

$name = $_POST['name'];
$email = $_POST['email'];
$date = $_POST['birthdate'];
$date = str_replace('/', '-', $date);
date('Y-m-d', $date);
$gender = $_POST['gender'];
if($gender == "male") {
    $gender = "M";
} else {
    $gender = "F";
}
$street = $_POST['street'];
$city = $_POST['city'];
$country = $_POST['country'];
$pincode = $_POST['pincode'];
$pincode = (int)$pincode;
$username = $_POST['username'];
$password = $_POST['password'];
$confpassword = $_POST['confpassword'];

$conn = new mysqli('localhost', 'project_steam', 'projectsteam', 'Project_steam');
$query = '';
$bool_exist = false;

if(!empty($username)) {
    $query = "SELECT Username FROM Users WHERE Username = '$username'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    if($row > 0) {
        $bool_exist = true;
    }
}

if($bool_exist) {
    header("Location: usersignupform.php?done=1");
} else {
    if(empty($name) || empty($email) || empty($date) || empty($username) || empty($password) || empty($confpassword)) {
        header("Location: usersignupform.php?done=2");
    } else if($password != $confpassword) {
        header("Location: usersignupform.php?done=3");
    } else {

        $query = "INSERT INTO Users (Name, Email_Id, Gender, BirthDate, Password, Username) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssss", $name, $email, $gender, $date, $password, $username);
        $stmt->execute();

        $query = "SELECT User_Id FROM Users WHERE Username = '$username' LIMIT 1";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        $user_Id = $row['User_Id'];

        $query = "INSERT INTO Users_address (User_Id, Street, City, Country, Pincode) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssss", $user_Id, $street, $city, $country, $pincode);
        $stmt->execute();

        $conn->close();
    }
}
?>