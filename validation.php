<html>
    <head>
        <title>Validation Page</title>
    </head>
    <Body>
    <?php 
        $un=$_POST["UserName"];
        $pwd=$_POST["password"];
        $rl=$_POST["role"];
        $UDB = "USE myDB";
        //echo "Name:" . $un . "<br>Password:" . $pwd . "<br>Role:" . $rl;   //UNCOMMENT TO SEE THE DATA SENT FROM THE LOGIN PAGE
        $servername = "localhost";
        $username = "root";
        $password = "";
        $displayadmin = "SELECT * FROM Admin";
        $conn = new mysqli($servername, $username, $password);
                                                                            // Check connection
        if ($conn->connect_error) 
            {                                             
                die("Connection failed: " . $conn->connect_error);
            }
        if ($conn->query($UDB) === TRUE)
                                                                            /*
                                                                            {echo "Database in use";
                                                                            } 
                                                                            else {
                                                                            echo "Error connecting to database: " . $conn->error;
                                                                            } 
                                                                            */
                                                                        
    
        $result = $conn->query($displayadmin);                              //Select table query and stored in result
        $count=0;                                                           //INITIALISE FLAG VARIABLE
        while($row = $result->fetch_assoc())                                //PARSING THROUGH THE DATA
            { 
                if ($row["Uid"] === $un and $row["pd"] === $pwd) 
                {
                    $count=1;                                               //SET FLAG VARIABLE
                    break;
                }
            }
        
        if($count==1)
            {
                echo "Authentication Success!";                              //IF USER AND PASSWORD MATCH ARE FOUND
            } 
        else
            {
                echo "Unaouthorised User!";                                // IF USER AND PASSWORD MATCH ARE FOUND
            }
        ?>  
    </body>
</html>