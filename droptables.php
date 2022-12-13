<html>
    <head>
        <title> DATABASE INITIALISATION ONE TIME USE ONLY </title>
    </head>
    <body>
    <?php
    //establish connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new mysqli($servername, $username, $password);


    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //use database
    $sql = "USE myDB";
    if ($conn->query($sql) === TRUE) {
    echo "Database in use";
    } else {
    echo "Error connecting to database: " . $conn->error;
    }

    // drop tables 
    $Dadmin = "DROP TABLE Admin";
    $Dmoderator = "DROP TABLE Moderator";
    $Duser = "DROP TABLE User";

    if ($conn->query($Dadmin) == TRUE)
    {
        echo "Admin deleted successfully<br>";
    } 
    else 
    {
        echo "Error deleting admin" . $conn->error;
        
    }
    if ($conn->query($Dmoderator) == TRUE)
    {
        echo "Moderator deleted successfully<br>";
    } 
    else 
    {
        echo "Error deleting moderator" . $conn->error;
        
    }
    if ($conn->query($Duser) == TRUE)
    {
        echo "User deleted successfully<br>";
    } 
    else 
    {
        echo "Error deleting user" . $conn->error;
        
    }
    ?>

    </body>
</html>