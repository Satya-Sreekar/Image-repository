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

    //truncate tables
    $TAdmin = "TRUNCATE TABLE Admin";
    $TModerator = "TRUNCATE TABLE MODERATOR";
    $TUser = "TRUNCATE TABLE USER";
    if ($conn->query($TAdmin) == TRUE)
    {
        echo "Table truncated successfully<br>";
    } 
    else 
    {
        echo "Error truncating the table" . $conn->error;
        
    }
    if ($conn->query($TModerator) == TRUE)
    {
        echo "Table truncated successfully<br>";
    } 
    else 
    {
        echo "Error truncating the table" . $conn->error;
        
    }
    if ($conn->query($TUser) == TRUE)
    {
        echo "Table truncated successfully<br>";
    } 
    else 
    {
        echo "Error truncating the table" . $conn->error;
        
    }
    ?>

    </body>
</html>