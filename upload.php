<?php
// Connect to the database
require('DBinfo.php');
// Check if the form has been submitted
if (isset($_FILES['images'])) {
  // Loop through all uploaded files
  for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
    $image = $_FILES['images']['tmp_name'][$i];
    $image_name = $_FILES['images']['name'][$i];
    $image_size = $_FILES['images']['size'][$i];
    $image_type = $_FILES['images']['type'][$i];

    // Read the binary data of the image
    $data = file_get_contents($image);

    // Escape the binary data to prevent SQL injection
    $data = mysqli_real_escape_string($conn, $data);

    // Insert the image into the database
    $sql = "INSERT INTO images (name, size, type, data)
            VALUES ('$image_name', '$image_size', '$image_type', '$data')";
    mysqli_query($conn, $sql);
  }
// Query to retrieve all images from the database
$sql = "SELECT * FROM images";
$result = mysqli_query($conn, $sql);

// Loop through all images and display them
while ($row = mysqli_fetch_assoc($result)) {
  echo '<img src="data:image/jpeg;base64,' . base64_encode($row['data']) . '"/>';
}
}
?>
