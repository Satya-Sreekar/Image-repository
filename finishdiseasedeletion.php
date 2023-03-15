<?php
session_start();

if (!isset($_SESSION['UN'])) {
    header("location:index.php");
    exit;
}

require('DBinfo.php');

$c = $_SESSION['Crop'] . $_SESSION['action'];

$CropDisease = urldecode($_POST['CropDisease']);

$DU = "SELECT * FROM ";
$DU .= $c;
$query = "";
echo $CropDisease;
$result = $conn->query($DU);
while ($row = $result->fetch_assoc()) {
    if ($row["PName"] == $CropDisease) {
        echo $CropDisease;
        echo $row["PName"];
        $query = "DELETE FROM $c WHERE PName = '" . $CropDisease . "'";
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