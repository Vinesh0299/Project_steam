<?php
session_start();

$User_Id = $_SESSION['User_Id'];
$friend_Id = $_GET['Reciever_Id'];

$conn = new mysqli('localhost', 'project_steam', 'projectsteam', 'Project_steam');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Friend Details</title>
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
            #friend {
                display: flex;
                flex-direction: column;
                margin-top: 45px;
                display: inline-block;
                border: 3px solid lightgrey;
                padding: 25px;
                background-color: skyblue;
                border-radius: 7px;
            }
            #friend div {
                display: flex;
                justify-content: space-around;
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
            <div id="friend">
                <h2><b>User's Details:</b></h2>
                <?php
                    $result = $conn->query("SELECT * FROM Users WHERE User_Id = '$friend_Id' LIMIT 1");
                    $row = $result->fetch_assoc();
                ?>
                <div>
                    <p><b>Name:</b></p>
                    <?php
                        echo "<p>" . $row['Name']. "</p>"
                    ?>
                </div>
                <div>
                    <p><b>Username:</b></p>
                    <?php
                        echo "<p>" . $row['Username']. "</p>"
                    ?>
                </div>
                <div>
                    <p><b>Gender:</b></p>
                    <?php
                        if($row['Gender'] == "M") {
                            echo "<p>"; echo "Male"; echo "</p>";
                        } else if($row['Gender'] == "F") {
                            echo "<p>"; echo "Female"; echo "</p>";
                        }
                    ?>
                </div>
                <div>
                    <p><b>Email:</b></p>
                    <?php
                        echo "<p>" . $row['Email_Id']. "</p>"
                    ?>
                </div>
                <div>
                    <p><b>Date of Birth:</b></p>
                    <?php
                        echo "<p>" . $row['BirthDate']. "</p>"
                    ?>
                </div>
                <?php
                    $result = $conn->query("SELECT * FROM Users_address WHERE User_Id = '$friend_Id' LIMIT 1");
                    $row = $result->fetch_assoc();
                ?>
                <div>
                    <p><b>Street:</b></p>
                    <?php
                        echo "<p>" . $row['Street']. "</p>"
                    ?>
                </div>
                <div>
                    <p><b>City:</b></p>
                    <?php
                        echo "<p>" . $row['City']. "</p>"
                    ?>
                </div>
                <div>
                    <p><b>Country:</b></p>
                    <?php
                        echo "<p>" . $row['Country']. "</p>"
                    ?>
                </div>
                <div>
                    <p><b>Pincode:</b></p>
                    <?php
                        echo "<p>" . $row['Pincode']. "</p>"
                    ?>
                </div>
            </div>
        </center>
    </body>
</html>