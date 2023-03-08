<?php
// Connect to the database
require('DBinfo.php');
// Query to retrieve all images from the database
$sql = "SELECT * FROM images";
$result = mysqli_query($conn, $sql);

// Loop through all images and display them
while ($row = mysqli_fetch_assoc($result)) {
  echo '<img src="data:image/jpeg;base64,' . base64_encode($row['data']) . '"/>';
}
?>
