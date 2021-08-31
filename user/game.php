<?php
$Game_Id = $_GET['Game_Id'];
session_start();

$User_Id = $_SESSION['User_Id'];

$conn = new mysqli('localhost', 'project_steam', 'projectsteam', 'Project_steam');
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
            <div id="uhome">
                <h2><b>Game Details are:</b></h2>
                <div style="display: flex;">
                    <div style="display: flex; flex-direction: column; text-align: left;">
                        <p>Name:</p>
                        <p>Installation size:</p>
                        <p>Platform:</p>
                        <p>Ram:</p>
                        <p>Graphic Card:</p>
                        <p>Release Date:</p>
                    </div>
                    <div style="display: flex; flex-direction: column; text-align: left; padding-left: 5%;">
                        <?php
                            $query = "SELECT * FROM Games WHERE Game_Id = '$Game_Id' LIMIT 1";
                            $result = $conn->query($query);
                            $row = $result->fetch_assoc();
                            $Game_name = $row['Game_name'];
                            echo "<p>" . $Game_name. "</p>";
                            echo "<p>" . $row['Install_size']. "</p>";
                            echo "<p>" . $row['Platform']. "</p>";
                            echo "<p>" . $row['Ram']. "</p>";
                            echo "<p>" . $row['Graphic_card']. "</p>";
                            echo "<p>" . $row['Release_date']. "</p>";
                        ?>
                    </div>
                </div>
                <div>
                    <?php
                        $query = "SELECT * FROM User_Inventory WHERE Game_Id = '$Game_Id'";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        if($row > 0) {
                            echo '<p>You already have this item in your inventory</p>';
                        } else {
                            $_SESSION['Game_name'] = $Game_name;
                            echo '<p>Click <a href="buygame.php?Game_Id='. $Game_Id. '">here</a>, to buy this game</p>';
                        }
                    ?>
                </div>
            </div>
        </center>
    </body>
</html>