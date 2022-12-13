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

    //insert into tables
    $Ainsert = "INSERT INTO Admin VALUES ('Sreekar','ASreekar@2003'),('Laasya','ALaasya@2004'),('super','superA')";
    $Minsert = "INSERT INTO Moderator VALUES ('Sreekar','MSreekar@2003'),('Laasya','MLaasya@2004'),('super','superM')";
    $Uinsert = "INSERT INTO  User VALUES ('Sreekar','USreekar@2003'),('Laasya','ULaasya@2004'),('super','superU')";
    
    if ($conn->query($Ainsert) == TRUE)
    {
        echo "Values inserted successfully<br>";
    } 
    else 
    {
        echo "Error inserting into the table" . $conn->error;
        
    }
    
    if ($conn->query($Minsert) == TRUE)
    {
        echo "Values inserted successfully<br>";
    } 
    else 
    {
        echo "Error inserting into the table" . $conn->error; 
    }
    
    if ($conn->query($Uinsert) == TRUE)
    {
        echo "Values inserted successfully<br>";
    } 
    else 
    {
        echo "Error inserting into the table" . $conn->error;
        
    }
    ?>

    </body>
</html>