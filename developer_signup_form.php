<?php
$done = $_GET['done'];
if($done == 1) {
    echo '<script type="text/javascript">alert("Username already exists try using another username")</script>';
} else if($done == 2) {
    echo '<script type="text/javascript">alert("Please fill up all the necessary details")</script>';
} else if($done == 3) {
    echo '<script type="text/javascript">alert("Your entered password do not match")</script>';
}
?>
<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <title>Sign up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style>
      body {
          font: 20px sans-serif;
      }
      form {
          display: flex;
          flex-direction: column;
          margin-top: 45px;
          display: inline-block;
          border: 3px solid lightgrey;
          padding: 25px;
          background-color: skyblue;
          border-radius: 7px;
      }
      p {
          margin-right: 20px;
      }
      div {
          margin-top: 8px;
          display: flex;
          flex-direction: row;
          justify-content: space-between;
      }
      #submit {
          color: white;
          background-color:skyblue ;
          margin-right: 4%;
          background-color: rgb(58, 61, 230);
      }
      .important::after {
          content: "*";
          color: red;
      }
      .error {
          text-align: center;
          color: red;
          background-color: lightred;
      }</style>
  </head>
  <body>
  <h1 style="text-align: center;"><b>Sign up for a steam  developer account</b></h1>
  <center>
  <form action="dev_signup.php" method="POST">
    <h3 style="text-align: center;"><b>Signup</b></h3><br>
    <div style="display: flex;">
      <div style="display: flex; flex-direction: column; text-align: left;">
        <p class="important">username:</p>
        <p class="important">Email:</p>
        <p>Street:</p>
        <p>City:</p>
        <p>Country:</p>
        <p>Pincode:</p>
        <p class="important">Password:</p>
        <p class="important">Confirm Password:</p>
      </div>
      <div style="display: flex; flex-direction: column; text-align: left; padding-left: 5%;">
        <input type="text" name="name">
        <input type="text" name="email">
        <input type="text" name="street">
        <input type="text" name="city">
        <input type="text" name="country">
        <input type="text" name="pincode">
        <input type="password" name="password">
        <input type="password" name="confpassword">
      </div>
    </div>
    <div>
      <button type="submit" name="submit" id="submit" class="form-control">Signup</button>
      <button type="reset" name="reset" class="form-control">Reset</button>
    </div>
    <div>
      <p style="font-size: smaller; color: red;">(*) - Details must not remain empty</p>
      </div>
      <p>Already have an account ?</p>
      <p>Click <a href="dev_login.php">here</a></p>
  </form>


  </center>

  </body>
</html>
