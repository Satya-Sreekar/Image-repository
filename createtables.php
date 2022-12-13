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

// create tables 

$createadmin= "CREATE TABLE Admin(Uid VARCHAR(25) NOT NULL primary key, pd VARCHAR(20) NOT NULL)";
$createuser = "CREATE TABLE User(Uid VARCHAR(25) NOT NULL primary key, pd VARCHAR(20) NOT NULL)";
$createmoderator = "CREATE TABLE Moderator(Uid VARCHAR(25) NOT NULL primary key, pd VARCHAR(20) NOT NULL)";

if (($conn->query($createadmin) === TRUE) && ($conn->query($createuser) === TRUE) && ($conn->query($createmoderator) === TRUE))  {
    echo "Tables created successfully";
    } else {
    echo "Error creating tables: " . $conn->error;
    }
    
    ?>

    </body>
</html>