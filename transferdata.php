<?php
session_start ();

if (!isset($_SESSION['UN']))
{
    header("location:index.php");
    exit;
}
// Connect to the database
require('DBinfo.php');

$id=$_POST['id'];
$sql = "INSERT INTO permdb (CROP, MONTH, YEAR, `CROP STAGE`, `PARTS-AFFECTED`, `DEVICE/SHOT`, SEASON, STATE, PORD, AREA, BACKGROUND, PORDNAME, IMGCONTAINS, STAGE, IMAGE)
SELECT CROP, MONTH, YEAR, `CROP STAGE`, `PARTS-AFFECTED`, `DEVICE/SHOT`, SEASON, STATE, PORD, AREA, BACKGROUND, PORDNAME, IMGCONTAINS, STAGE, IMAGE FROM tempdb WHERE IName =". $id;
$result = $conn->query($sql);

// if ($conn->affected_rows > 0) {
//     echo "Record deleted successfully" . $sql;
// } else {
//     echo "Error deleting record: " . $sql . $conn->error;
// }
echo "Success";
header('Refresh:1;URL=display.php');
?>