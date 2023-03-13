<?php
session_start ();
if (!isset($_SESSION['UN']))
{
    header("location:index.php");
    exit;
}
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

    // Check if the image is greater than 1 MiB
    if ($image_size > 1048576) {
      // Load the image
      if ($image_type === 'image/jpeg' || $image_type === 'image/jpg') {
        $source_image = imagecreatefromjpeg($image);
      } elseif ($image_type === 'image/png') {
        $source_image = imagecreatefrompng($image);
      } elseif ($image_type === 'image/gif') {
        $source_image = imagecreatefromgif($image);
      } else {
        die('Unsupported image type: ' . $image_type);
      }

      // Get the current dimensions of the image
      $width = imagesx($source_image);
      $height = imagesy($source_image);

      // Calculate the new dimensions to resize the image
      $new_width = $width / 2;
      $new_height = $height / 2;

      // Create a new image with the new dimensions
      $destination_image = imagecreatetruecolor($new_width, $new_height);

      // Resize the image
      imagecopyresampled($destination_image, $source_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

      // Save the compressed image to a temporary file
      $temp_file = tempnam(sys_get_temp_dir(), 'compressed_image_');
      if ($image_type === 'image/jpeg' || $image_type === 'image/jpg') {
        imagejpeg($destination_image, $temp_file);
      } elseif ($image_type === 'image/png') {
        imagepng($destination_image, $temp_file);
      } elseif ($image_type === 'image/gif') {
        imagegif($destination_image, $temp_file);
      }

      // Read the binary data of the compressed image
      $data = file_get_contents($temp_file);

      // Delete the temporary file
      unlink($temp_file);
    } else {
      // Read the binary data of the original image
      $data = file_get_contents($image);
    }

    // Escape the binary data to prevent SQL injection
    $data = mysqli_real_escape_string($conn, $data);

    // Insert the image into the database
    $sql = "INSERT INTO images (name, size, type, data)
            VALUES ('$image_name', '$image_size', '$image_type', '$data')";
    mysqli_query($conn, $sql);
  }
}
?>
