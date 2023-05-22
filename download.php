<?php
require('DBinfo.php');

// Create a new PDO instance
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Query to retrieve all images from the table
$sql = "SELECT IName,IMAGE FROM permdb";

// Prepare the SQL query
$stmt = $conn->prepare($sql);

// Execute the query
$stmt->execute();

// Create a new folder to store the downloaded images
$folder_name = 'downloaded_images';
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
    file_put_contents($folder_name . '/' . $filename, $image_data);
}
// Close the database connection
$conn = null;

// Zip the folder containing the downloaded images
$zip = new ZipArchive();
$zipname = 'downloaded_images.zip';

if ($zip->open($zipname, ZipArchive::CREATE) === TRUE) {
    // Add all files in the folder to the zip archive
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folder_name));
    foreach ($files as $name => $file) {
        if (!$file->isDir()) {
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($folder_name) + 1);
            $zip->addFile($filePath, $relativePath);
        }
    }

    // Close the zip archive
    $zip->close();
    
    // Download the zip archive to the user's computer
    header('Content-Type: application/zip');
    header('Content-disposition: attachment; filename='.$zipname);
    header('Content-Length: ' . filesize($zipname));
    readfile($zipname);
    
    // Delete the folder and zip archive from the server
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($folder_name, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );

    foreach ($files as $fileinfo) {
        $todo = ($fileinfo->isDir() ? 'rmdir' : 'unlink');
        $todo($fileinfo->getRealPath());
    }
    rmdir($folder_name);
    unlink($zipname);
}
?>
<html>
    <body>
        <h1>Download Sucessful</h1>
    </body>
</html>