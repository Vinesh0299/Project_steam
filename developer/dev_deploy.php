<?php
$done = $_GET['done'];
if($done == 1) {
    echo '<script type="text/javascript">alert("Please fill all the required details")</script>';
} else if ($done == 2) {
    echo '<script type="text/javascript">alert("Your Game was deployed successfully!!")</script>';
} else if ($done == 3) {
    echo '<script type="text/javascript">alert("Another Game with same name already exists!! Try using another name!!")</script>';
}
session_start();

$dev_Id = $_SESSION['Developer_Id'];

$conn = new mysqli('localhost', 'project_steam', 'projectsteam', 'Project_steam');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $_SESSION['login_dev']; ?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style>
            body {
                font: 20px sans-serif;
            }
            #dash {
                margin-top: 50px;
                display: flex;
                flex-direction: row;
            }
            .dashboard {
                background-color: rgb(247, 48, 81);
                color: white;
            }
            .dashboard:hover {
                background-color: white;
                color: black;
            }
            #uhome {
                display: flex;
                flex-direction: column;
                margin-top: 45px;
                display: inline-block;
                border: 3px solid lightgrey;
                padding: 25px;
                background-color: pink;
                border-radius: 7px;
            }
            #uhome div {
                display: flex;
                justify-content: space-between;
            }
            #submit {
                color: white;
                background-color: blue;
                margin-right: 4%;
                background-color: rgb(58, 61, 230);
            }
        </style>
    </head>
    <body>
        <center>
            <h1><b>Developer: <?php echo $_SESSION['login_dev']; ?></b></h1>
            <div id="dash">
                <a href="dev_deploy.php" class="form-control dashboard">Deploy Games</a>
                <a href="dev_profile.php" class="form-control dashboard">Deployed games</a>
                <a href="dev_bank.php" class="form-control dashboard">Bank</a>
                <a href="dev_profile.php" class="form-control dashboard"><?php echo $_SESSION['login_dev']; ?></a>
                <a href="dev_logout.php" class="form-control dashboard">Log out</a>
            </div>
            <div id="uhome">
                <h2><b>Enter Details of your game:</b></h2>
                <form action="deploy.php" method="POST">
                    <div style="display: flex;">
                        <div style="display: flex; flex-direction: column; text-align: left;">
                            <p>Name:</p>
                            <p>Installation size:</p>
                            <p>Platform:</p>
                            <p>Ram:</p>
                            <p>Graphic Card:</p>
                            <p>Release Date:</p>
                        </div>
                        <div style="display: flex; flex-direction: column; padding-left: 5%;">
                            <input type="text" name="name">
                            <input type="text" name="install_size">
                            <input type="text" name="platform">
                            <input type="text" name="ram">
                            <input type="text" name="graphic">
                            <input type="date" name="release_date">
                        </div>
                    </div>
                    <div style="margin-top: 5%;">
                        <button type="submit" name="submit" id="submit" class="form-control">Deploy</button>
                        <button type="reset" name="reset" class="form-control">Reset</button>
                    </div>
                </form>
            </div>
        </center>
    </body>
</html>