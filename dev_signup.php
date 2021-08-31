<?php
$name = $_POST['name'];
$email = $_POST['email'];
$street = $_POST['street'];
$city = $_POST['city'];
$country = $_POST['country'];
$pincode = $_POST['pincode'];
$pincode = (int)$pincode;
$password = $_POST['password'];
$confpassword = $_POST['confpassword'];
$conn = new mysqli('localhost', 'project_steam', 'projectsteam', 'Project_steam');
$query = '';
$bool_exist = false;

if(!empty($name)) {
    $query = "SELECT name FROM Developers WHERE name = '$name'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    if($row > 0) {
        $bool_exist = true;
    }
}
if($bool_exist) {
    header("Location: developer_signup_form.php?done=1");
} else {
    if(empty($name) || empty($email) || empty($password) || empty($confpassword)) {
        header("Location: developer_signup_form.php?done=2");
    } else if($password != $confpassword) {
        header("Location: developer_signup_form.php?done=3");
    } else {

        $query = "INSERT INTO Developers (Name, Email_Id, Password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $name, $email,$password);
        $stmt->execute();

        $query = "SELECT Developer_Id FROM Developers WHERE name = '$name' LIMIT 1";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        $user_Id = $row['Developer_Id'];

        $query = "INSERT INTO Developers_address (Developer_Id, Street, City, Country, Pincode) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssss", $Developer_Id, $street, $city, $country, $pincode);
        $stmt->execute();

        $conn->close();
        header("Location: developer/dev_profile.php");
    }
}


 ?>
