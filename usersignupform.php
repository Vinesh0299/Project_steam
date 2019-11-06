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
<html lang="en">
    <head>
        <meta charset="UTF-8">
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
                background-color: blue;
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
            }
        </style>
    </head>
    <body>
        <h1 style="text-align: center;"><b>Sign up for a steam account</b></h1>
        <center>
            <form action="usersignup.php" method="POST">
                <h3 style="text-align: center;"><b>Signup</b></h3><br>
                <div>
                    <p class="important">Name:</p>
                    <input type="text" name="name">
                </div>
                <div>
                    <p class="important">Email:</p>
                    <input type="text" name="email">
                </div>
                <div>
                    <p class="important">Date of Birth:</p>
                    <input type="date" name="birthdate">
                </div>
                <div>
                    <p>Gender:</p>
                    <div style="text-align: right; display: flex; align-items: baseline;">
                        <input type="radio" name="gender" value="male" style="margin-left: 5px; margin-right: 5px;">Male
                        <input type="radio" name="gender" value="female" style="margin-left: 5px; margin-right: 5px;">Female
                    </div>
                </div>
                <div>
                    <p>Street:</p>
                    <input type="text" name="street">
                </div>
                <div>
                    <p>City:</p>
                    <input type="text" name="city">
                </div>
                <div>
                    <p>Country:</p>
                    <input type="text" name="country">
                </div>
                <div>
                    <p>Pincode:</p>
                    <input type="text" name="pincode">
                </div>
                <div>
                    <p class="important">Username:</p>
                    <input type="text" name="username">
                </div>
                <div>
                    <p class="important">Password:</p>
                    <input type="password" name="password">
                </div>
                <div>
                    <p class="important">Confirm Password:</p>
                    <input type="password" name="confpassword">
                </div>
                
                <div>
                    <button type="submit" name="submit" id="submit" class="form-control">Signup</button>
                    <button type="reset" name="reset" class="form-control">Reset</button>
                </div>
                <div>
                    <p style="font-size: smaller; color: red;">(*) - Details must not remain empty</p>
                </div>
            </form>
        </center>
    </body>
</html>