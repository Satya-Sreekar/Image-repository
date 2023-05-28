<html>
    <head>
        <title> CROP DATA </title>
    </head>
    <body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    $dropcrop = "DROP TABLE castorpests";
                                                                            
    $createcastordisease= "CREATE TABLE castorpests(Id int(25) NOT NULL primary key, PName VARCHAR(30) NOT NULL, SCName Varchar(30) NOT NULL)";

    
    $castordiseaseinsert = "INSERT INTO castorpests VALUES (101,'Seedling blight', 'Phytophthora parasitica'),
                                            (102,'Rust','Melampsora ricini'),
                                            (103,'Leaf blight','Alternaria ricini'),
                                            (104,'Brown leaf spot','Cercospora ricinella'),
                                            (105,'Powdery mildew','Leveillula taurica'),
                                            (106,'Stem rot', 'Macrophomina phaseolina'),
                                            (107,'Bacterial leaf spot','Xanthomonas campestris pv. ricinicola'),
                                            (108,'Wilt','Fusarium oxysporum'),
                                            (109,'Alternaria Blight','Alternaria ricini Y'),
                                            (110,'Root rot / Charcoal Rot / Die back','Macrophomina phaseolina'),
                                            (111,'Fusarium wilt','Fusarium oxysporum f. sp. ricini'),
                                            (112,'Grey mold','Botrytis ricini'),
                                            (113,'Capsule rot','Cladosporium oxysporum')";

    $displaycastordisease = "SELECT * FROM castorpests";

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
    if($conn->query($createcastordisease) == TRUE)
    {
        echo "Table created successfully";
    }
    else 
    {
        echo "Error creating table: " . $conn->error;
    }
    

    //insert data
    if($conn->query($castorinsertdisease)==TRUE)
    {
        echo "Inserted into table successfully";
    }
    else 
    {
        echo "Error inserting data into CROP";
    }
    */
    //dislpay details   
    $result = $conn->query($displaycastordisease);
    echo "DIeases occuring in castor<br>";
    while($row = $result->fetch_assoc()) 
        echo "Id: " . $row["Id"]. " - disease: " . $row["PName"]. " - Scientific Name" . $row["SCName"] . "<br>";    
    ?>

    </body>
</html>