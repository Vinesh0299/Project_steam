<?php
   session_start();

   $name = $_POST['name'];
   $password = $_POST['password'];

   $conn = new mysqli('localhost', 'project_steam', 'projectsteam', 'Project_steam');
   $query = ''; $pass = '';
   if(!empty($username)) {
      $query = "SELECT Password FROM Developers WHERE Username = '$name' LIMIT 1";
      $result = $conn->query($query);
      $row = $result->fetch_assoc();
      $pass = $row['Password'];
   }

   if(empty($name) || empty($password)) {
      header("Location: error_dev.php?done=3");
   } else if(empty($pass)) {
      header("Location: error_dev.php?done=2");
   } else if($password != $pass) {
      header("Location: error_dev.php?done=1");
   } else {
      $_SESSION['login_dev'] = $name;
      $query = "SELECT Developer_Id FROM Developers WHERE Username = '$name' LIMIT 1";
      $result = $conn->query($query);
      $row = $result->fetch_assoc();
      $_SESSION['Developer_Id'] = $row['Developer_Id'];
      header("Location: developer/dev_profile.php");
   }
?>
