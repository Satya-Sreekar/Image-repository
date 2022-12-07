<html>
    <head>
        <title> DATABASE INITIALISATION </title>
    </head>
    <body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $Dadmin = "DROP TABLE Admin";
    $Dmoderator = "DROP TABLE Moderator";
    $Duser = "DROP TABLE User";
    $createadmin= "CREATE TABLE Admin(Uid VARCHAR(25) NOT NULL primary key, pd VARCHAR(20) NOT NULL)";
    $createuser = "CREATE TABLE User(Uid VARCHAR(25) NOT NULL primary key, pd VARCHAR(20) NOT NULL)";
    $createmoderator = "CREATE TABLE Moderator(Uid VARCHAR(25) NOT NULL primary key, pd VARCHAR(20) NOT NULL)";
    $sqlinsert = "INSERT INTO Admin VALUES ('Sreekar','Sreekar@2003'),('Laasya','Laasya@2004')";
    $displayadmin = "SELECT * FROM Admin";
    
    //$db = "myDB";
    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
        
    // Create database
    
    //$sql = "CREATE DATABASE myDB";
    $sql = "USE myDB";
    if ($conn->query($sql) === TRUE) {
    echo "Database in use";
    } else {
    echo "Error connecting to database: " . $conn->error;
    }   
     
    /*
    //create tables
    if (($conn->query($createadmin) === TRUE) && ($conn->query($createuser) === TRUE) && ($conn->query($createmoderator) === TRUE))  {
        echo "Tables created successfully";
        } else {
        echo "Error creating tables: " . $conn->error;
        }

    if ($conn->query($sqlinsert) === TRUE) {
        echo "Inserted into Database successfully";
        } else {
        echo "Error inserting into database" . $conn->error;
        }
    */

    
    $result = $conn->query($displayadmin);

            while($row = $result->fetch_assoc()) 
                echo "id: " . $row["Uid"]. " - password: " . $row["pd"]. "<br>";    
    ?>

    </body>
</html>