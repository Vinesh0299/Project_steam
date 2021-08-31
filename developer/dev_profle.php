<?php
$done = $_GET['done'];
if($done == 10) {
    echo '<script type="text/javascript">alert("Your game was removed from steam servers successfully!!!")</script>';
}
session_start();

$dev_Id = $_SESSION['Developer_Id'];

$conn = new mysqli('localhost', 'project_steam', 'projectsteam', 'Project_steam');

$query = "SELECT COUNT(Developer_Id) AS COUNT FROM Games WHERE Developer_Id = '$dev_Id'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$numgames = $row['COUNT'];
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
            <h1><b>Welcome Developer: <?php echo $_SESSION['login_dev']; ?></b></h1>
            <div id="dash">
                <a href="dev_deploy.php" class="form-control dashboard">Deploy Games</a>
                <a href="dev_profile.php" class="form-control dashboard">Deployed games</a>
                <a href="dev_bank.php" class="form-control dashboard">Bank</a>
                <a href="dev_profile.php" class="form-control dashboard"><?php echo $_SESSION['login_dev']; ?></a>
                <a href="dev_logout.php" class="form-control dashboard">Log out</a>
            </div>
            <div id="uhome">
                <h2>Deployed Games:</h2>
                <center>
                    <div id="table">
                        <div>
                            <h4><b>Game_Id</b></h4>
                            <h4><b>Game</b></h4>
                        </div>
                        <?php
                            if($numgames > 0) {
                                $result = $conn->query("SELECT Game_Id, Game_name FROM Games WHERE Developer_Id = '$dev_Id'");
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