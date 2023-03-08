<?php
session_start ();
if (!isset($_SESSION['UN']))
{
    header("location:index.php");
    exit;
}
    require('DBinfo.php');
$Crop = $_POST["Crop"];
$pord = $_POST["pord"];
$_SESSION['CROP'] = $Crop;
$_SESSION['PORD'] = $pord;
$d= $_SESSION['PORD'] . $_SESSION['CROP'];
$C = "SELECT * FROM $d";
?>
<html>
<head>
        <title>
            Submition Form
        </title>
        <link rel="stylesheet" href="U2.css">
    </head>
    <body>
    <center><h1>User Upload</h1></center>
<div id="box">
<form action="/U2.php" method="POST">
<table align="center" cellpadding="3px"> 
    <tr>
        <td colspan="2" align="center">
            <h2>Scientific Name<h2>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <select id="Crop" name="Crop">';
            <?php
            
            if ($result = $conn->query($C)) 
            {
                while ($row = $result->fetch_assoc()) 
                {
                    $Pest = $row["Pest"].'-'.$row["SName"];
                    echo'<H1><option value='.$Pest.'>'.$Pest.'</option></h1>';
                }
                echo 
                '</select>
                </td>';
                $result->free();
            }
            ?>
        </td>
    </tr>
    
    <tr>
        <td colspan="2" align="center">
            <h3>Pest Stage</h3>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <select id="pord" name="pord">
            <option value='pest'>Pest</option>
            <option value='diease'>Disease</option>

        </td>
    </tr>
    <tr>
        <td align="center" colspan="2">
        <input type="submit" value="Submit">
        </td>
    </tr>
</table>
</form>
</div>
    </body>
</html>