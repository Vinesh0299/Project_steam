<?php
   session_start();
   $name = $_POST['name'];
   $password = $_POST['password'];
   $conn = new mysqli('localhost','root','longterm','steam');
   $query = ''; $pass = '';
   if(!empty($username)) {
      $query = "SELECT Password FROM developers WHERE name = '$name' LIMIT 1";
      $result = $conn->query($query);
      $row = $result->fetch_assoc();
      $pass = $row['Password'];
   }
   if(empty($name) || empty($password)) {
      header("Location: erroruser.php?done=3");
   } else if(empty($pass)) {
      header("Location: erroruser.php?done=2");
   } else if($password != $pass) {
      header("Location: erroruser.php?done=1");
   } else {
      $_SESSION['login_dev'] = $name;
      header("Location: dev_profile.php");
   }
?>
