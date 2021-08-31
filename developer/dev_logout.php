<?php
session_start();
if(isset($_SESSION['login_dev'])) {
    session_destroy();
}
?>

<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>Log out</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style>
            body {
                font: 20px sans-serif;
                background-color: pink;
            }
            h1 {
                margin-top: 20%;
            }
        </style>
    </head>
    <body>
        <center>
            <h1>You were successfully logged out of steam......</h1>
            <p>Click <a href="../steam.html">here</a> to login again</p>
        </center>
    </body>
</html>