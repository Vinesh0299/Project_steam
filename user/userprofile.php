<?php
session_start();

$User_Id = $_SESSION['User_Id'];

$conn = new mysqli('localhost', 'project_steam', 'projectsteam', 'Project_steam');

$query = "SELECT COUNT(User_Id) AS COUNT FROM User_Inventory WHERE User_Id = '$User_Id'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$numgames = $row['COUNT'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $_SESSION['login_user']; ?></title>
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
            #uhome {
                display: flex;
                flex-direction: column;
                margin-top: 45px;
                display: inline-block;
                border: 3px solid lightgrey;
                padding: 25px;
                background-color: skyblue;
                border-radius: 7px;
            }
            #table {
                display: flex;
                flex-direction: column;
            }
            #uhome #table div {
                display: flex;
                justify-content: space-between;
            }
        </style>
    </head>
    <body>
        <center>
            <h1><b>Welcome user: <?php echo $_SESSION['login_user']; ?></b></h1>
            <div id="dash">
                <a href="usersearch.php" class="form-control dashboard">Search Games</a>
                <a href="userfriends.php" class="form-control dashboard">Friends</a>
                <a href="userprofile.php" class="form-control dashboard">Inventory</a>
                <a href="userbank.php" class="form-control dashboard">Bank</a>
                <a href="userprofile.php" class="form-control dashboard"><?php echo $_SESSION['login_user']; ?></a>
                <a href="logout.php" class="form-control dashboard">Log out</a>
            </div>
            <div id="uhome">
                <h2>Available Games to play: <?php echo $numgames; ?></h2>
                <center>
                    <div id="table">
                        <div>
                            <h4><b>Game_Id</b></h4>
                            <h4><b>Game</b></h4>
                        </div>
                        <?php
                            if($numgames > 0) {
                                $result = $conn->query("SELECT Game_Id, Game_name FROM User_Inventory WHERE User_Id = '$User_Id'");
                                while($row = $result->fetch_assoc()) {
                                    echo '<div>';
                                        echo "<p>" . $row['Game_Id']. "</p>";
                                        echo "<p><a href='game.php?Game_Id=" . $row['Game_Id']. "'>" . $row['Game_name']. "</a></p>";
                                    echo '</div>';
                                }
                            }
                        ?>
                    </div>
                </center>
            </div>
        </center>
    </body>
</html>