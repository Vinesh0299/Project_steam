<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>Project steam</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style>
            body {
                font: 20px sans-serif;
            }
            header {
                display: flex;
                flex-direction: row;
                justify-content: space-evenly;
            }
           
            #For_Gamers{
                margin-top: 45px;
                border: 3px solid lightgrey;
                padding: 25px;
                background-color: skyblue;
                border-radius: 7px;
                width: 365px;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }
            #For_Developers{
                margin-top: 45px;
                border: 3px solid lightgrey;
                padding: 25px;
                background-color: pink;
                border-radius: 7px;
                width: 365px;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }

        
            li {
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <h1 style="text-align: center; font-size: 50px;"><b>Welcome to Steam</b></h1>
        <header>
           
            <div id="For_Gamers">
                <h1 style="text-align: center;"><b>Gamers</b></h1>
                
                <h4>Click <a href="usersteam.html">here</a> </h4>
            </div>
            <div id="For_Developers">
                <h1 style="text-align: center;"><b>Developers</b></h1>
                
                <h4>Click <a href="dev_steam.html">here</a> </h4>
            </div>
            
            
        </header>
    </body>
</html>