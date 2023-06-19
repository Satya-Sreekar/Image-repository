<html>
    <head>
        <title>Validation Page</title>
    </head>
    <Body>
    <?php
    require 'DBinfo.php';
        $un=$_POST["UserName"];
        $pwd=$_POST["password"];
        $rl=$_POST["role"];
        $UDB = "USE myDB";
        //echo "Name:" . $un . "<br>Password:" . $pwd . "<br>Role:" . $rl . "<br>";   //UNCOMMENT TO SEE THE DATA SENT FROM THE LOGIN PAGE
        $DA = "SELECT * FROM admin";
        $DU = "SELECT * FROM user";
        $DM = "SELECT * FROM moderator";
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
                        if($row["pd"] === $pwd)
                        {
                            $ct=1;
                            break;
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
                        if($row["pd"] === $pwd)
                        {
                            $ct=1;
                            break;
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
                    echo "username: " . $row["Uid"] . "password: " .  $row["pd"] . "<br>"; 
                    if ($row["Uid"] === $un) 
                    {
                        if($row["pd"] === $pwd)
                        {
                            $ct=1;
                            break;
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
                echo "<script>alert('User Not found!Try Again')</script>";                                // IF USER IS NOT FOUND
                echo "<script>location.href='index.php'</script>";
            
          ;
        }

        
        if($ct==1)
            {   session_start();
                $_SESSION['UN'] = $un;
                $_SESSION['Role'] = $rl;
                if($rl=="User")
                {
                    header('Location:User.php'); 
                }
                elseif($rl=="Moderator")
                {
                    header('Location:display.php'); 
                }
                elseif($rl=="Admin")
                {
                    header('Location: manipulate.php'); 
                }
                                             //IF USER AND PASSWORD MATCH ARE FOUND
            } 
        elseif($ct==2)
            {
                echo "<script>alert('Incorrect Password!Try Again')</script>";
                echo "<script>location.href='index.php'</script>";                               // IF USER IS FOUND, PASSWORD MISMATCH
            }
        elseif($ct==3)
            {
                echo "<script>alert('User Not found!Try Again')</script>";                                // IF USER IS NOT FOUND
                echo "<script>location.href='index.php'</script>";
            }
        ?>  
    </body>
</html>
