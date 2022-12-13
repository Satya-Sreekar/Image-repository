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

    // display tables
    $displayadmin = "SELECT * FROM Admin";
    $displaymoderator = "SELECT * FROM Moderator";
    $displayuser = "SELECT * FROM User";
    
    $sqladmin = $conn->query($displayadmin);
    $sqlmoderator = $conn->query($displaymoderator);
    $sqluser = $conn->query($displayuser);

    echo "admin credentials: <br> <br>";
    while($row = $sqladmin->fetch_assoc()) 
        echo "id: " . $row["Uid"]. " - password: " . $row["pd"]. "<br>";    
    
    echo "moderator credentials: <br> <br>";
    while($row = $sqlmoderator->fetch_assoc()) 
        echo "id: " . $row["Uid"]. " - password: " . $row["pd"]. "<br>";  
    
    echo "user credentials: <br> <br>";   
    while($row = $sqluser->fetch_assoc()) 
        echo "id: " . $row["Uid"]. " - password: " . $row["pd"]. "<br>";
    
    ?>

    </body>
</html>