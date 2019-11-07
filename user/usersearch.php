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
        <title>Search Games</title>
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
            .dashboard:hover{
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
            #searchresult {
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
            #searchresult #table div {
                display: flex;
                justify-content: space-between;
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
            <div>
                <form action="usersearch.php" method="POST">
                    <input type="text" name="search">
                    <button class="form-control button">Search</button>
                </form>
            </div>
            <div id="searchresult">
                <h2>Search results are:</h2>
                <center>
                    <div id="table">
                        <div>
                            <h4><b>Game_Id</b></h4>
                            <h4><b>Game</b></h4>
                        </div>
                        <?php
                            if(!empty($search)) {
                                $result = $conn->query("SELECT Game_Id, Game_name FROM Games WHERE Game_name LIKE '%" . $search. "%'");
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