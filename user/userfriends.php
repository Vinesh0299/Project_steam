<?php
session_start();

$User_Id = $_SESSION['User_Id'];
$search = $_POST['search'];

$conn = new mysqli('localhost', 'project_steam', 'projectsteam', 'Project_steam');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Profile</title>
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
            div form {
                margin-top: 60px;
                display: flex;
                justify-content: center;
            }
            .button {
                color: white;
                background-color: rgb(58, 61, 230);
                width: 10%;
            }
            .button:hover {
                color: black;
                background-color: white;
            }
            #searchresult, #currentfriend {
                display: flex;
                flex-direction: column;
                margin-top: 45px;
                display: inline-block;
                border: 3px solid lightgrey;
                padding: 25px;
                background-color: skyblue;
                border-radius: 7px;
            }
            #table, #total {
                display: flex;
                flex-direction: column;
            }
        </style>
    </head>
    <body>
        <center>
            <div id="total">
                <h1><b>User: <?php echo $_SESSION['login_user']; ?></b></h1>
                <div id="dash">
                    <a href="usersearch.php" class="form-control dashboard">Search Games</a>
                    <a href="userfriends.php" class="form-control dashboard">Friends</a>
                    <a href="userprofile.php" class="form-control dashboard">Inventory</a>
                    <a href="userbank.php" class="form-control dashboard">Bank</a>
                    <a href="userprofile.php" class="form-control dashboard"><?php echo $_SESSION['login_user']; ?></a>
                    <a href="logout.php" class="form-control dashboard">Log out</a>
                </div>
                <div>
                    <form action="userfriends.php" method="POST">
                        <input type="text" name="search">
                        <button class="form-control button">Search</button>
                    </form>
                </div>
                <div id="currentfriend">
                    <h2>Current Friends are:</h2>
                    <center>
                        <div id="table">
                            <div>
                                <h4><b>Username</b></h4>
                            </div>
                            <?php
                                $result = $conn->query("SELECT Reciever_Id, Reciever_name FROM Friendship WHERE Request_status = 'Accepted'");
                                while($row = $result->fetch_assoc()) {
                                    echo '<div>';
                                        echo "<p><a href='friend.php?Reciever_Id=" . $row['Reciever_Id']. "'>" . $row['Reciever_name']. "</a></p>";
                                    echo '</div>';
                                }
                            ?>
                        </div>
                    </center>
                </div>
                <div id="searchresult">
                    <h2>Search results are:</h2>
                    <center>
                        <div id="table">
                            <div>
                                <h4><b>Username</b></h4>
                            </div>
                            <?php
                                if(!empty($search)) {
                                    $result = $conn->query("SELECT User_Id, Name FROM Users WHERE Name LIKE '%" . $search. "%'");
                                    while($row = $result->fetch_assoc()) {
                                        echo '<div>';
                                            echo "<p><a href='friend.php?Reciever_Id=" . $row['User_Id']. "'>" . $row['Name']. "</a></p>";
                                        echo '</div>';
                                    }
                                }
                            ?>
                        </div>
                    </center>
                </div>
            </div>
        </center>
    </body>
</html>