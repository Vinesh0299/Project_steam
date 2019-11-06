<?php
   session_start();

   $username = $_POST['username'];
   $password = $_POST['password'];

   $conn = new mysqli('localhost', 'project_steam', 'projectsteam', 'Project_steam');
   $query = ''; $pass = '';
   if(!empty($username)) {
      $query = "SELECT Password FROM Users WHERE Username = '$username' LIMIT 1";
      $result = $conn->query($query);
      $row = $result->fetch_assoc();
      $pass = $row['Password'];
   }

   if(empty($username) || empty($password)) {
      header("Location: erroruser.php?done=3");
   } else if(empty($pass)) {
      header("Location: erroruser.php?done=2");
   } else if($password != $pass) {
      header("Location: erroruser.php?done=1");
   } else {
      $_SESSION['login_user'] = $username;
      header("Location: userprofile.php");
   }
?>