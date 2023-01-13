<html>
    <head>
        <title>
            Submition Form
        </title>
        <link rel="stylesheet" href="User.css">
    </head>
    <body>
        <Center><H1 id="UserTitle">User Upload</H1></Center>
        <div>
    <?php
        session_start ();
        require('DBinfo.php');
        $C = "SELECT * FROM Crop";
    ?>
    <table border="0" cellspacing="50" cellpadding="5" align="Center" width="500px" margin="50"> 
        <th>
            <H1>Select Crop:</h1>  
        </th>
        <td>
          <select id="Crop" name="Crop">';
        <?php
        if ($result = $conn->query($C)) 
        {
            while ($row = $result->fetch_assoc()) 
            {
                $Crop = $row["CName"];
                echo'<H1><option value='.$Crop.'>'.$Crop.'</option></h1>';
            }
            echo 
            '</select>
            </td>';
            $result->free();

        }
        ?>
        <tr>
        <td>
        <button onclick="window.location.href='logout.php'"><H4>Logout</H4></button>
        </td>
        <td> 
        <button type="button" onclick="myFunction()"><H4>Next</H4></button>
        </td>
        </tr>
        <script>
        function myFunction() {
        var x = document.getElementById("Crop").selectedIndex;
        var y = document.getElementById("Crop").options;
        document.write(y[x].text);
        }
        </script>
        </div>
    </body>
</html>