<?php
require('../DBinfo.php');

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to retrieve all images from the table
    $sql = "SELECT `IName`,`IMAGE` FROM permdb;";

    // Prepare the SQL query
    $stmt = $conn->prepare($sql);

    // Execute the query
    $stmt->execute();

    // Create a new folder to store the downloaded images
    $folder_name = "downloaded_images";
    if (!file_exists($folder_name)) {
        mkdir($folder_name);
    }

    // Loop through the results and download each image
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $image_data = $row['IMAGE'];
        $iname = $row['IName']; // Get the IName column value
        // Generate a unique filename for each image
        $filename = $iname . '.jpg'; // Rename the file using IName

        // Save the image to the folder
        if (file_put_contents($folder_name . '/' . $filename, $image_data) === false) {
            // Handle error (e.g., log it or inform the user)
        }
    }

    // Create a zip archive containing the images
    $zipFilename = $folder_name . '.zip';
    $zip = new ZipArchive();
    if ($zip->open($zipFilename, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
        foreach (glob($folder_name . '/*') as $file) {
            $zip->addFile($file, basename($file));
        }
        $zip->close();

        // Send the zip file to the user
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename=' . $zipFilename);
        readfile($zipFilename);

        // Delete the zip file after sending
        unlink($zipFilename);
    } else {
        // Handle zip creation error
    }
} catch (PDOException $e) {
    // Handle database connection or query error
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn = null;
?>
