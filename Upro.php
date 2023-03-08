<?php

session_start ();
if (!isset($_SESSION['UN']))
{
    header("location:index.php");
    exit;
    
}
    require('DBinfo.php');

$_SESSION['CROP'] =  $_POST["Crop"];
$_SESSION['PORD'] = $_POST["pord"];
$_SESSION['date'] = $_POST["date"];
$_SESSION['cs'] =  $_POST["cstage"];
$_SESSION['state'] = $_POST["part"];
$_SESSION['part'] = $_POST["state"];
$_SESSION['device'] = $_POST["device"];
$_SESSION['season'] = $_POST["season"];

header("location:imup.php");
switch ($_SESSION['PORD'])
{
    case "Healthy":
        $E="INSERT INTO healthy (crop, dt, cropstage, st, part, device, season) VALUES ('".$_SESSION['CROP']."', '".$_SESSION['date']."', '".$_SESSION['cs']."', '".$_SESSION['state']."', '".$_SESSION['part']."', '".$_SESSION['device']."', '".$_SESSION['season']."')";
        $conn->query($E);
        $C = "SELECT * FROM healthy";
        if ($result = $conn->query($C)) 
        {
        while ($row = $result->fetch_assoc()) 
            {
                echo $row['crop'].$row['dt'].$row['cropstage'].$row['st'].$row['st'].$row['part'].$row['device'].$row['season'].$row['ID']."<br>";
            }
        }
        header("location:imup.php");

        break;
    case "pest":
        break;
    case "disease":
        break;
    case "NE":
        break;
}

?>