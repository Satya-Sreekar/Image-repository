<html>
    <head>
        <title> CROP DATA </title>
    </head>
    <body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    $dropcrop = "DROP TABLE crop";
                                                                            
    $createcastor= "CREATE TABLE castorpests(Id int(25) NOT NULL primary key, PName VARCHAR(30) NOT NULL, SCName Varchar(30) NOT NULL)";

    
    $castorinsert = "INSERT INTO castorpests VALUES (101,'Red Hairy Catterpillar', 'Amsacta albistriga Walker'),
                                            (102,'Castor semilooper','Achoea janata Linnaeus'),
                                            (103,'Tobacco caterpillar','Spodoptera litura (Fabr)'),
                                            (104,'Shoot and Capsule borer','Conogethes (Dichocrosis) punctiferalis'),
                                            (105,'Leaf hopper','Empoasca flavescens (Fabr)'),
                                            (106,'Thrips', 'Retithrips syriacus (Mayet)'),
                                            (107,'Whitefly','Trialeurodes ricini (Misra)'),
                                            (108,'Serpentine leaf miner','Liriomyza trifolii Burgess'),
                                            (109,'Bihar Hairy caterpillar','Spilosoma (Diacrisia) obliqua wlk.'),
                                            (110,'Red spider mite','Tetranychus telarious L.') ";

    $displaycastor = "SELECT * FROM castorpests";

    $conn = new mysqli($servername, $username, $password);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    
    //use database
    $sql = "USE myDB";
    if ($conn->query($sql) === TRUE) 
    {
        echo "Database in use";
    } 
    else 
    {
        echo "Error connecting to database: " . $conn->error;
    }  
    
    //create table
    /*
    if($conn->query($createcastor) == TRUE)
    {
        echo "Table created successfully";
    }
    else 
    {
        echo "Error creating table: " . $conn->error;
    }
    

    //insert data
    if($conn->query($castorinsert)==TRUE)
    {
        echo "Inserted into table successfully";
    }
    else 
    {
        echo "Error inserting data into CROP";
    }
    */
    //dislpay details   
    $result = $conn->query($displaycastor);
    
    while($row = $result->fetch_assoc()) 
        echo "Id: " . $row["Id"]. " - pest: " . $row["PName"]. " - Scientific Name" . $row["SCName"] . "<br>";    
    ?>

    </body>
</html>