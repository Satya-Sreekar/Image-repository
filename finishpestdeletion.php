<?php
session_start();

if (!isset($_SESSION['UN'])) {
    header("location:index.php");
    exit;
}

require('DBinfo.php');

$c = $_SESSION['Crop'] . $_SESSION['action'];

$CropPest = urldecode($_POST['CropPest']);

$DU = "SELECT * FROM ";
$DU .= $c;  
$query = "";
echo "test= ". $CropPest;
$result = $conn->query($DU);
while ($row = $result->fetch_assoc()) {
    if ($row["PName"] == $CropPest) {
        $query = "DELETE FROM $c WHERE PName = '" . $CropPest . "'";
        echo $query;
        $conn->query($query);
    }
}

if ($conn->affected_rows > 0) {
    echo "Record deleted successfully" . $query;
} else {
    echo "Error deleting record: " . $query . $conn->error;
}

$conn->close();
?>