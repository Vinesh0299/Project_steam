<?php
session_start();

$Developer_Id = $_SESSION['Developer_Id'];

$conn = new mysqli('localhost', 'project_steam', 'projectsteam', 'Project_steam');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>User Bank</title>
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
            #bank {
                display: flex;
                flex-direction: column;
                margin-top: 45px;
                display: inline-block;
                border: 3px solid lightgrey;
                padding: 25px;
                background-color: pink;
                border-radius: 7px;
            }
            #bank div {
                display: flex;
                justify-content: space-between;
                margin-top: 20px;
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
            <div id="bank">
                <h2><b>Bank Account Details:</b></h2>
                <?php
                    $result = $conn->query("SELECT * FROM Bank_account WHERE Developer_Id = '$Developer_Id' LIMIT 1");
                    $row = $result->fetch_assoc();
                ?>
                <div style="display: flex;">
                    <div style="display: flex; flex-direction: column; text-align: left;">
                        <p><b>Name:</b></p>
                        <p><b>Account Pin:</b></p>
                        <p><b>Street:</b></p>
                        <p><b>City:</b></p>
                        <p><b>Country:</b></p>
                        <p><b>Pincode:</b></p>
                    </div>
                    <div style="display: flex; flex-direction: column; text-align: left; padding-left: 5%;">
                        <?php
                            echo "<p>" . $row['Name']. "</p>";
                            echo "<p>" . $row['Account_pin']. "</p>";
                            $result = $conn->query("SELECT * FROM Bank_acc_address WHERE Account_no = '$Account_no' LIMIT 1");
                            $row = $result->fetch_assoc();
                            echo "<p>" . $row['Street']. "</p>";
                            echo "<p>" . $row['City']. "</p>";
                            echo "<p>" . $row['Country']. "</p>";
                            echo "<p>" . $row['Pincode']. "</p>";
                        ?>
                    </div>
                </div>
            </div>
        </center>
    </body>
</html>