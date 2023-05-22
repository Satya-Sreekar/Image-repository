<?php
session_start();
if (!isset($_SESSION['UN'])) {
  header("location:index.php");
  exit;
}
require 'DBinfo.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Aproved Entries</title>
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
    button {
    background-color: rgb(54, 157, 63);
    padding: 0.23em 2%;
    color: white;
    font-size: 1em;
    border: none;
    transition: border 1ms;
}

    td {
      padding: auto;
      align-items: center;
      margin-right: 50px;
      border: 2px solid black;
    }

    .heading {
    display: flex;
    justify-content: space-between;
    border: 2px solid rgba(72, 172, 76, 251);
    background-color: rgba(74, 174, 78, 253);
    margin-top: 0;
    padding: 0.33em 9%;
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
    button:hover {
    opacity: 0.7;
    cursor: pointer;
}

button:active {
    opacity: 0.5;
}

  </style>
  <meta charset="UTF-8">
  <div class='heading'>
        <button>&#8249;</button>
        <center>
      <h1 class="h">
        Aproved Entries
      </h1>
      </center>
        <button onclick="window.location.href = 'logout.php';">Logout</button>
  </div>
</head>

<body>
  <center>
    <script>
      function confirmReject() {
        var result = confirm("Are you sure you want to reject this?");
        if (result) {
          document.getElementById('submit-btn').click();
        }
      }

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
        imgElem.style.display = 'block';
        imgElem.style.maxWidth = '100%';
        imgElem.style.maxHeight = '100%';
        imgElem.style.margin = '5% auto auto auto';
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
      $stmt = $conn->query("SELECT * FROM permdb");
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
            <h2 class="z">STATE</h2>
          </th>
          <th>
            <h2 class="z">DEVICE</h2>
          </th>
          <th>
            <h2 class="z">PEST STAGE</h2>
          </th>
          <th rowspan="2">
            <h2 class="z">IMAGE</h2>
          </th>
        </tr>
        <!-- ************************************************** -->
        <tr>
          <th>
            <h2 class="z">SEASON</h2>
          </th>
          <th>
            <h2 class="z">PARTS AFFECTED</h2>
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
            <h2 class="z">Approve</h2>
          </th>
        </tr>
        <?php
        foreach ($data as $row) {
          $_SESSION['ID'] = $row['IName'];
          $id = $_SESSION['ID'];
          echo "<tr style='margin-top: 1%;'>
                    <td><center>{$row['IName']}</center></td>
                    <td><center>{$row['CROP']}</center></td>
                    <td><center>{$row['MONTH']}</center></td>
                    <td><center>{$row['YEAR']}</center></td>
                    <td><center>{$row['CROP STAGE']}</center></td>
                    <td><center>{$row['PARTS-AFFECTED']}</center></td>
                    <td><center>{$row['DEVICE/SHOT']}</center></td>
                    <td><center>{$row['STAGE']}</center></td>
                    <td rowspan=" . "2" . "><img src=\"data:image/jpeg;base64," . base64_encode($row['IMAGE']) . "\" onclick=\"openFullscreenImage(this)\" style=\"width: 200px; height: 200px; cursor: pointer;\" /></td>
              </tr>
              <style>
                  .butt1{
                    background-color:white;
                    padding:3%;
                    border-radius:10px;
                    margin-bottom:15px;
                  }
                  .butt1:hover{
                    background-color:green;
                    color:white;
                  }
                  .butt1:active{
                    opacity:0.7;
                  }
                  .butt2{
                    background-color:white;
                    padding:3%;
                    border-radius:10px;
                    margin-bottom:15px;
                  }
                  .butt2:hover{
                    background-color:red;
                    color:white;
                  }
                  .butt2:active{
                    opacity:0.7;
                  }
                  .butt3{
                    background-color:white;
                    padding:3%;
                    border-radius:10px;
                    margin-bottom:15px;
                  }
                  .butt3:hover{
                    background-color:#FFD700;
                    color:cornsilk;
                  }
                  .butt3:active{
                    opacity:0.7;
                  }
              </style>
              <tr>
                    <td><center>{$row['SEASON']}</center></td>
                    <td><center>{$row['STATE']}</center></td>
                    <td><center>{$row['PORD']}</center></td>
                    <td><center>{$row['AREA']}</center></td>
                    <td><center>{$row['BACKGROUND']}</center></td>
                    <td><center>{$row['PORDNAME']}</center></td>
                    <td><center>{$row['IMGCONTAINS']}</center></td>
                    <td><center>
                          <form action='/transferdata.php' method='POST' style='text-align:center;'>
                            <input type=" . "hidden" . " name=" . "id" . " value=" . $id . ">
                            <input class='butt1' type='submit' name='approve' onclick='/transferdata.php' value='Approve &#x2714;'></input>
                          </form>

                          <form action='/reject.php' method='POST' style='text-align:center;'>
                            <input type=" . "hidden" . " name=" . "id" . " value=" . $id . ">
                            <input class='butt2' type='submit' onclick=" . "confirmReject()" . " value='Reject &#x2716;'></input>
                          </form>
                      
                                           
                          <form action='/transferdata.php' method='POST' style='text-align:center;'>
                            <input type=" . "hidden" . " name=" . "id" . " value=" . $id . ">
                            <input class='butt3' type='submit' name='approve' onclick='/transferdata.php' value='Edit &#x2712;'></input>
                          </form>
                        </center>
                    </td>
                    
              </tr>
              <tr>
                <td colspan=" . "9" . ">
                <br>
                </td>
              </tr>
                  ";
        }
        echo "</table>";

    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    ?>
  </center>
</body>

</html>