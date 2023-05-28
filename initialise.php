<html>
    <head>
        <title> DATABASE INITIALISATION </title>
    </head>
    <body>
    <?php
                                                                                    // Create connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new mysqli($servername, $username, $password); 
    $db = "myDB";
    $CDB = "CREATE DATABASE myDB";
    $UDB = "USE myDB";          // Check connection
    if ($conn->query($UDB) === TRUE) {                                                          //USE DATABASE
        echo "Database in use";
        } else {
        echo "Error connecting to database: " . $conn->error;
        }
    
    //DROP
    $Dadmin = "DROP TABLE Admin";
    $Dmoderator = "DROP TABLE Moderator";
    $Duser = "DROP TABLE User";
    //$conn->query($Dadmin .';'. $Dmoderator .';'. $Duser.';' );
            //CREATE
    $createA= "CREATE TABLE Admin(Uid VARCHAR(25) NOT NULL primary key, pd VARCHAR(20) NOT NULL)";
    $createU = "CREATE TABLE User(Uid VARCHAR(25) NOT NULL primary key, pd VARCHAR(20) NOT NULL)";
    $createM = "CREATE TABLE Moderator(Uid VARCHAR(25) NOT NULL primary key, pd VARCHAR(20) NOT NULL)";
    //$conn->query($createA . $createA . $createA);
    //INSERT
    $sqlinsertA = "INSERT INTO Admin VALUES ('Sreekar','ASreekar@2003'),('Laasya','ALaasya@2004'),('superA','superA')";
    $sqlinsertU = "INSERT INTO User VALUES ('Sreekar','USreekar@2003'),('Laasya','ULaasya@2004'),('superU','superU')";
    $sqlinsertM = "INSERT INTO Moderator VALUES ('Sreekar','MSreekar@2003'),('Laasya','MLaasya@2004'),('superM','superM')";
    //DISPLAY
    $displayA = "SELECT * FROM Admin";
    $displayU = "SELECT * FROM User";
    $displayM = "SELECT * FROM Moderator";


    $conn->query($Dadmin);
    $conn->query($Duser);
    $conn->query($Dmoderator);

    
    if ($conn->connect_error) {
    die("Connection failed: <br>" . $conn->connect_error);
    }
                                                                                                /*   
                                                                                                // Create database
                                                                                                if ($conn->query($CDB) === TRUE) {
                                                                                                echo "Database Created";
                                                                                                } else {
                                                                                                echo "Error connecting to database: " . $conn->error;
                                                                                                }   
                                                                                                */
 
    
                                                                                                //create tables
    if ($conn->query($createA) === TRUE)
        {
            echo "Admin Tables created successfully<br>";
        } 
    else 
        {
            echo "Error creating tables:<br> " . $conn->error;
        }

    if ($conn->query($sqlinsertA) === TRUE) 
        {
            echo "Inserted into Admin Database successfully<br>";
        } 
    else 
        {
        echo "Error inserting into database<br>" . $conn->error;
        }
        if ($conn->query($createU) === TRUE)
        {
            echo "Tables created successfully<br>";
        } 
    else 
        {
            echo "Error creating tables: <br>" . $conn->error;
        }

    if ($conn->query($sqlinsertU) === TRUE) 
        {
            echo "Inserted into Database successfully<br>";
        } 
    else 
        {
        echo "Error inserting into database<br>" . $conn->error;
        }
        if ($conn->query($createM) === TRUE)
        {
            echo "Tables created successfully<br>";
        } 
    else 
        {
            echo "Error creating tables:<br> " . $conn->error;
        }

    if ($conn->query($sqlinsertM) === TRUE) 
        {
            echo "Inserted into Database successfully<br>";
        } 
    else 
        {
        echo "Error inserting into database<br>" . $conn->error;
        }
    
    $result = $conn->query($displayA);  

            while($row = $result->fetch_assoc()) 
                echo "id: " . $row["Uid"]. " <br> password: " . $row["pd"]. "<br><br>";    
    $result = $conn->query($displayU);  

                while($row = $result->fetch_assoc()) 
                    echo "id: " . $row["Uid"]. " <br> password: " . $row["pd"]. "<br><br>";
    $result = $conn->query($displayM);  

                    while($row = $result->fetch_assoc()) 
                        echo "id: " . $row["Uid"]. " <br> password: " . $row["pd"]. "<br><br>";
        
    ?>

    </body>
</html>