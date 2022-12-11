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
        $DA = "SELECT * FROM Admin";
        $DU = "SELECT * FROM User";
        $DM = "SELECT * FROM Moderator";
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
                                                                        
    //Switch CASE
   switch ($rl) {
        case "User":
            $result = $conn->query($DU);                              //Select table query and stored in result                           //Select table query and stored in result
            $ct=0;                                                           //INITIALISE FLAG VARIABLE
            while($row = $result->fetch_assoc())                                //PARSING THROUGH THE DATA
                { 
                    if ($row["Uid"] === $un) 
                    {
                        if($row["pd"==$pwd])
                        {
                            $ct=1;
                        }
                        else
                        {
                            $ct=2;
                        }                                               //SET FLAG VARIABLE
                        
                    }
                    else{
                        $ct=3;
                    }
                }
          break;
        case "Moderator":
            $result = $conn->query($DM);                              //Select table query and stored in result                              //Select table query and stored in result
            $ct=0;                                                           //INITIALISE FLAG VARIABLE
            while($row = $result->fetch_assoc())                                //PARSING THROUGH THE DATA
                { 
                    if ($row["Uid"] === $un) 
                    {
                        if($row["pd"==$pwd])
                        {
                            $ct=1;
                        }
                        else
                        {
                            $ct=2;
                        }                                               //SET FLAG VARIABLE
                        
                    }
                    else{
                        $ct=3;
                    }
                }
          break;
        case "Admin":
            $result = $conn->query($DA);                              //Select table query and stored in result
            $ct=0;                                                           //INITIALISE FLAG VARIABLE
            while($row = $result->fetch_assoc())                                //PARSING THROUGH THE DATA
                { 
                    if ($row["Uid"] === $un) 
                    {
                        if($row["pd"==$pwd])
                        {
                            $ct=1;
                        }
                        else
                        {
                            $ct=2;
                        }                                               //SET FLAG VARIABLE
                        
                    }
                    else{
                        $ct=3;
                    }
                }
          break;            
        default:
            header('Location: /fail.php');
          ;
        }

        
        if($ct==1)
            {
                header('Location: /welcome.php');                              //IF USER AND PASSWORD MATCH ARE FOUND
            } 
        elseif($ct==2)
            {
                header('Location: /fail1.php');                                // IF USER AND PASSWORD MATCH ARE NOT FOUND
            }
        elseif($ct==3)
            {
                header('Location: /fail2.php');                                // IF USER AND PASSWORD MATCH ARE NOT FOUND
            }
        ?>  
    </body>
</html>