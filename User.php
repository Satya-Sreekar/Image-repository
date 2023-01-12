<html>
    <head>
        <title>
            Submition Form
        </title>
        <link rel="stylesheet" href="User.css">
    </head>
    <table>
    <body>
    <?php
        session_start ();
        echo "Welcome " . $_SESSION['UN'];
        require('DBinfo.php');
        $C = "SELECT * FROM Crop";
    ?>
    <table border="0" cellspacing="20" cellpadding="5" align="Center"> 
        <th>
            Select Crop  
        </th>
        <td>
          <select id="Crop" name="Crop">';
        <?php
        if ($result = $conn->query($C)) 
        {
            while ($row = $result->fetch_assoc()) 
            {
                $Crop = $row["CName"];
                echo'<option value='.$Crop.'>'.$Crop.'</option>';
            }
            echo '</select></td>';
            $result->free();

        }
        ?>
        <tr>
        <td>
        <center><a href="/logout.php">Logout</a></center>
    </td>
        <td> 
        <button type="button" onclick="myFunction()">Next</button>
        </td>
        </tr>
        <script>
        function myFunction() {
        var x = document.getElementById("Crop").selectedIndex;
        var y = document.getElementById("Crop").options;
        document.write(y[x].text);
        }
        </script>

    </body>
    </table>   
</html>