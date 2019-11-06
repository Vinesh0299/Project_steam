<?php
$done = $_GET['done'];
if($done == 1) {
    echo '<script type="text/javascript">alert("Username or Password invalid")</script>';
} else if ($done == 2) {
    echo '<script type="text/javascript">alert("User doesnot exists, make a steam account first")</script>';
} else if ($done == 3) {
    echo '<script type="text/javascript">alert("Please enter valid details")</script>';
}
?>

<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style>
            body {
                font: 20px sans-serif;
            }
            form {
                margin-top: 45px;
                display: inline-block;
                border: 3px solid lightgrey;
                padding: 25px;
                background-color: skyblue;
                border-radius: 7px;
            }
            form p {
                text-align: left;
            }
            article {
                display: flex;
                flex-direction: row;
            }
            #submit {
                color: white;
                background-color: blue;
                margin-right: 4%;
                background-color: rgb(58, 61, 230);
                margin-bottom: 10%;
            }
        </style>
    </head>
    <body>
        <h1 style="text-align: center;"><b>Steam Login</b></h1>
        <p style="text-align: center; color: rgb(230, 48, 48);">An error occurred!! Try logging in again!</p>
        <center>
            <form action="userlogin.php" method="POST">
                <h1 style="text-align: center;"><b>Login</b></h1><br>
                <p>Username:</p>
                <input type="text" name="username"><br><br>
                <p>Password:</p>
                <input type="password" name="password"><br><br>
                <article>
                    <button type="submit" name="submit" id="submit" class="form-control" >Login</button>
                    <button type="reset" name="reset" class="form-control" >Reset</button>
                </article>
                <p>Don't have an account yet?</p>
                <p>Click <a href="usersignupform.php">here</a> to make a free account</p>
            </form>
        </center>
    </body>
</html>