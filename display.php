<?php
require 'DBinfo.php';

// Create database connection
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // select all data from the table
  $stmt = $conn->query("SELECT * FROM tempdb");
  $data = $stmt->fetchAll();

  // print the data in a labeled HTML table 
  echo "<table>
          <tr>
            <th>CROP</th>
            <th>MONTH</th>
            <th>YEAR</th>
            <th>CROP STAGE</th>
            <th>PARTS AFFECTED</th>
            <th>DEVICE</th>
            <th>SEASON</th>
            <th>STATE</th>
            <th>PORD</th>
            <th>AREA</th>
            <th>BACKGROUND</th>
            <th>IMAGEDESC</th>
            <th>IMAGECONT</th>
            <th>STAGE</th>
            <th>IMAGE</th>
          </tr>";
  foreach ($data as $row) {
    echo "<tr>
            <td>{$row['CROP']}</td>
            <td>{$row['MONTH']}</td>
            <td>{$row['YEAR']}</td>
            <td>{$row['CROP STAGE']}</td>
            <td>{$row['PARTS AFFECTED']}</td>
            <td>{$row['DEVICE']}</td>
            <td>{$row['SEASON']}</td>
            <td>{$row['STATE']}</td>
            <td>{$row['PORD']}</td>
            <td>{$row['AREA']}</td>
            <td>{$row['BACKGROUND']}</td>
            <td>{$row['IMAGEDESC']}</td>
            <td>{$row['IMAGECONT']}</td>
            <td>{$row['STAGE']}</td>
            <td><img src=\"data:image/jpeg;base64,".base64_encode($row['IMAGE'])."\" /></td>
          </tr>";
  }
  echo "</table>";

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
