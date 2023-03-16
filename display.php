<?php
require 'DBinfo.php';
?>

<!DOCTYPE html>
<html>

<head>
  <title>Aprover</title>
  <style>
    html {
      background-color: cornsilk;
    }

    th {

      padding: auto;
      margin-right: 20%;
      font-size: 60%;
      align-content: center;
      border: 2px solid black;
    }

    td {
      padding: auto;
      align-items: center;
      margin-right: 50px;
      border: 2px solid black;
    }

    .heading {
      border: 2px solid rgba(72, 172, 76, 251);
      background-color: rgba(74, 174, 78, 253);
      margin-top: 0%;
      padding-top: 5px;
      padding-right: 90px;
      padding-bottom: 5px;
      padding-left: 90px;
      box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.15);
    }

    table {
      border-spacing: 2px;
      padding: 0%;
      margin-top: 30px;
      border: 2px solid black;
      margin-left: 10px;
      margin-right: 10px;
      align-items: center;
    }

    .z {
      margin-right: 10px;
      margin-left: 10px;
    }

    body {
      margin: 0%;
    }

    .h {
      margin: 0%;
    }
  </style>
  <meta charset="UTF-8">
  <div class='heading'>
    <center>
      <h1 class="h">
        Aprover
      </h1>
    </center>
  </div>
</head>

<body>
  <script>
    function openFullscreenImage(img) {
      // Create a new full-screen element
      var fullscreen = document.createElement('div');
      fullscreen.style.position = 'fixed';
      fullscreen.style.top = 0;
      fullscreen.style.left = 0;
      fullscreen.style.width = '100%';
      fullscreen.style.height = '100%';
      fullscreen.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
      fullscreen.style.zIndex = 9999;

      // Create the image element and insert it into the full-screen element
      var imgElem = document.createElement('img');
      imgElem.src = img.src;
      imgElem.style.maxWidth = '100%';
      imgElem.style.maxHeight = '100%';
      imgElem.style.margin = 'auto';
      fullscreen.appendChild(imgElem);

      // Add the full-screen element to the document body
      document.body.appendChild(fullscreen);

      // Add a click event listener to the full-screen element to remove it when clicked
      fullscreen.addEventListener('click', function () {
        document.body.removeChild(fullscreen);
      });
    }

  </script>

  <?php
  // Create database connection
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo " ";

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // select all data from the table
    $stmt = $conn->query("SELECT * FROM tempdb");
    $data = $stmt->fetchAll();
    ?>
    <table>
      <tr>
        <th>
          <h2 class="z">IMAGE Name</h2>
        </th>
        <th>
          <h2 class="z">CROP</h2>
        </th>
        <th>
          <h2 class="z">MONTH</h2>
        </th>
        <th>
          <h2 class="z">YEAR</h2>
        </th>
        <th>
          <h2 class="z">CROP STAGE</h2>
        </th>
        <th>
          <h2 class="z">PARTS AFFECTED</h2>
        </th>
        <th>
          <h2 class="z">DEVICE</h2>
        </th>
        <th>
          <h2 class="z">SEASON</h2>
        </th>
        <th>
          <h2 class="z">STATE</h2>
        </th>
        <th>
          <h2 class="z">PORD</h2>
        </th>
        <th>
          <h2 class="z">AREA</h2>
        </th>
        <th>
          <h2 class="z">BACKGROUND</h2>
        </th>
        <th>
          <h2 class="z">IMAGEDESC</h2>
        </th>
        <th>
          <h2 class="z">IMAGECONT</h2>
        </th>
        <th>
          <h2 class="z">STAGE</h2>
        </th>
        <th>
          <h2 class="z">IMAGE</h2>
        </th>
      </tr>
      <?php
      foreach ($data as $row) {
        echo "<tr>
                    <td><center>{$row['IName']}</center></td>
                    <td><center>{$row['CROP']}</center></td>
                    <td><center>{$row['MONTH']}</center></td>
                    <td><center>{$row['YEAR']}</center></td>
                    <td><center>{$row['CROP STAGE']}</center></td>
                    <td><center>{$row['PARTS-AFFECTED']}</center></td>
                    <td><center>{$row['DEVICE/SHOT']}</center></td>
                    <td><center>{$row['SEASON']}</center></td>
                    <td><center>{$row['STATE']}</center></td>
                    <td><center>{$row['PORD']}</center></td>
                    <td><center>{$row['AREA']}</center></td>
                    <td><center>{$row['BACKGROUND']}</center></td>
                    <td><center>{$row['PORDNAME']}</center></td>
                    <td><center>{$row['IMGCONTAINS']}</center></td>
                    <td><center>{$row['STAGE']}</center></td>
                    <td><img src=\"data:image/jpeg;base64," . base64_encode($row['IMAGE']) . "\" onclick=\"openFullscreenImage(this)\" style=\"width: 200px; height: 200px; cursor: pointer;\" /></td>
                  </tr>
                  <tr>
                    <td colspan=" . "16" . ">
                      <center>The New Line of aproving!</center>
                    </td>
                  </tr>
                  ";
      }
      echo "</table>";

  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  ?>
</body>

</html>