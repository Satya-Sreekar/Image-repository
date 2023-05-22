<?php
session_start();

if (!isset($_SESSION['UN'])) {
    header("location:index.php");
    exit;
}
// Connect to the database
require('DBinfo.php');

$id = $_POST['id'];
$sql = "DELETE FROM tempdb WHERE IName =" . $id;
$result = $conn->query($sql);

echo
    "
<html>
    <style>
    html
    {
        background-color:cornsilk;
    }
    h1
    {
        margin-top:25%;
    }
    </style>
    <body>
        <center>
            <h1>
                Success
            </h1>
        </center>
    </body>
</html>
";
header('Refresh:1;URL=display.php');
?>