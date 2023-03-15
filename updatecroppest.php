<?php
session_start();
if (!isset($_SESSION['UN'])) {
    header("location:index.php");
    exit;
}
require('DBinfo.php');
echo '<form action="/finishpestdeletion.php" method="post">
<select id="CropPest" name="CropPest">';
$_SESSION['Crop'] = $_POST['Crop'];
$c = $_SESSION['Crop'] . $_SESSION['action'];   
$C = "Select * FROM $c";
if ($result = $conn->query($C)) {
    while ($row = $result->fetch_assoc()) {
        $PName = $row["PName"];
        $SName = $row["SCName"];
        echo '<H1><option value=' . urlencode($PName) . '>' . $PName  . '</option></h1>';
    }
    echo
        '</select></td>';
    $result->free();
}
echo '<br><br>';
echo '<button type="submit" name="updatechange">submit</button> </form>';
?>

