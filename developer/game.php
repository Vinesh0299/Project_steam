<?php
$Game_Id = $_POST['Game_Id'];
session_start();

$Developer_Id = $_SESSION['Developer_Id'];

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
                            echo "<p>" . $row['Name']. "</p>";
                            echo "<p>" . $row['Install_size']. "</p>";
                            echo "<p>" . $row['Platform']. "</p>";
                            echo "<p>" . $row['Ram']. "</p>";
                            echo "<p>" . $row['Graphic_card']. "</p>";
                            echo "<p>" . $row['Release_date']. "</p>";
                        ?>
                    </div>
                </div>
                <div>
                    <p>Click <a href="gamedelete.php?Game_Id=<?php echo $Game_Id; ?>">here</a>, to delete this game</p>
                </div>
            </div>
        </center>
    </body>
</html>