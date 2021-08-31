<?php
session_start();

$User_Id = $_SESSION['User_Id'];

$conn = new mysqli('localhost', 'project_steam', 'projectsteam', 'Project_steam');
$result = $conn->query("SELECT Account_no FROM Bank_account WHERE User_Id = '$User_Id' LIMIT 1");
$row = $result->fetch_assoc();
$account_no = $row['Account_no'];
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
                background-color: rgb(58, 61, 230);
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
                background-color: skyblue;
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
            <h1><b>User: <?php echo $_SESSION['login_user']; ?></b></h1>
            <div id="dash">
                <a href="usersearch.php" class="form-control dashboard">Search Games</a>
                <a href="userfriends.php" class="form-control dashboard">Friends</a>
                <a href="userprofile.php" class="form-control dashboard">Inventory</a>
                <a href="userbank.php" class="form-control dashboard">Bank</a>
                <a href="userprofile.php" class="form-control dashboard"><?php echo $_SESSION['login_user']; ?></a>
                <a href="logout.php" class="form-control dashboard">Log out</a>
            </div>
            <div id="bank">
                <h2><b>Bank Account Details:</b></h2>
                <?php
                    $result = $conn->query("SELECT * FROM Bank_account WHERE User_Id = '$User_Id' LIMIT 1");
                    $row = $result->fetch_assoc();
                ?>
                <div style="display: flex;">
                    <div style="display: flex; flex-direction: column; text-align: left;">
                        <p><b>Name:</b></p>
                        <p><b>Gender:</b></p>
                        <p><b>Date of Birth:</b></p>
                        <p><b>Account Pin:</b></p>
                        <p><b>Street:</b></p>
                        <p><b>City:</b></p>
                        <p><b>Country:</b></p>
                        <p><b>Pincode:</b></p>
                    </div>
                    <div style="display: flex; flex-direction: column; text-align: left; padding-left: 5%;">
                        <?php
                            echo "<p>" . $row['Name']. "</p>";
                            if($row['Gender'] == "M") {
                                echo "<p>"; echo "Male"; echo "</p>";
                            } else if($row['Gender'] == "F") {
                                echo "<p>"; echo "Female"; echo "</p>";
                            }
                            echo "<p>" . $row['BirthDate']. "</p>";
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