<?php
session_start();
if (!isset($_SESSION['UN'])) {
  header("location:index.php");
  exit;
}
require 'DBinfo.php';

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->query("SELECT * FROM tempdb");
  $data = $stmt->fetchAll();
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  exit;
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Approver</title>
  <link rel="stylesheet" href="AdminDisplay.css">
  <meta charset="UTF-8">
</head>

<body>
  <div class='heading'>
    <div></div>
    <center>
      <h1 class="h">Approver</h1>
    </center>
    <button onclick="window.location.href = 'logout.php';">Logout</button>
  </div>
  <table>
        <tr>
            <th><h2 class="z">IMAGE Name</h2></th>
            <th><h2 class="z">CROP</h2></th>
            <th><h2 class="z">MONTH</h2></th>
            <th><h2 class="z">YEAR</h2></th>
            <th><h2 class="z">CROP STAGE</h2></th>
            <th><h2 class="z">STATE</h2></th>
            <th><h2 class="z">DEVICE</h2></th>
            <th><h2 class="z">PEST STAGE</h2></th>
            <th rowspan="2"><h2 class="z">IMAGE</h2></th>
        </tr>
        <tr>
            <th><h2 class="z">SEASON</h2></th>
            <th><h2 class="z">PARTS AFFECTED</h2></th>
            <th><h2 class="z">HEALTH STATE</h2></th>
            <th><h2 class="z">AREA</h2></th>
            <th><h2 class="z">BACKGROUND</h2></th>
            <th><h2 class="z">IMAGEDESC</h2></th>
            <th><h2 class="z">IMAGECONT</h2></th>
            <th><h2 class="z">Click here to download</h2></th>
        </tr>
        <?php foreach ($data as $row): ?>
            <?php
            $_SESSION['ID'] = $row['IName'];
            $id = $_SESSION['ID'];
            ?>
            <tr style="margin-top: 1%;">
                <td><center><?= $row['IName'] ?></center></td>
                <td><center><?= $row['CROP'] ?></center></td>
                <td><center><?= $row['MONTH'] ?></center></td>
                <td><center><?= $row['YEAR'] ?></center></td>
                <td><center><?= $row['CROP STAGE'] ?></center></td>
                <td><center><?= $row['PARTS-AFFECTED'] ?></center></td>
                <td><center><?= $row['DEVICE/SHOT'] ?></center></td>
                <td><center><?= $row['STAGE'] ?></center></td>
                <td rowspan="2">
                    <img src="data:image/jpeg;base64,<?= base64_encode($row['IMAGE']) ?>"
                         onclick="openFullscreenImage(this)"
                         style="width: 200px; height: 200px; cursor: pointer;">
                </td>
            </tr>
            <tr>
                <td><center><?= $row['SEASON'] ?></center></td>
                <td><center><?= $row['STATE'] ?></center></td>
                <td><center><?= $row['PORD'] ?></center></td>
                <td><center><?= $row['AREA'] ?></center></td>
                <td><center><?= $row['BACKGROUND'] ?></center></td>
                <td><center><?= $row['PORDNAME'] ?></center></td>
                <td><center><?= $row['IMGCONTAINS'] ?></center></td>
                <td>
                    <center>
            <form action='transferdata.php' method='POST' style='text-align:center;'>
              <input type=hidden name='id' value="<?= $id ?>">
              <input class='butt1' type='submit' name='approve' onclick='transferdata.php'
                value='Approve &#x2714;'></input>
            </form>

            <form action='reject.php' method='POST' style='text-align:center;'>
              <input type=hidden name='id' value="<?= $id ?>">
              <input class='butt2' type='submit' onclick=confirmReject() value='Reject &#x2716;'></input>
            </form>


            <form action='edit.php' method='POST' style='text-align:center;'>
              <input type=hidden name='id' value="<?= $id ?>">
              <input class='butt3' type='submit' name='edit' onclick='edit.php' value='Edit &#x2712;'></input>
            </form>
          </center>
        </td>

      </tr>
      <tr>
        <td colspan="9">
          <br>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
  <script>
    function confirmReject() {
      var result = confirm("Are you sure you want to reject this?");
      if (result) {
        document.getElementById('submit-btn').click();
      }
    }

    function openFullscreenImage(img) {
      var fullscreen = document.createElement('div');
      fullscreen.style.position = 'fixed';
      fullscreen.style.top = 0;
      fullscreen.style.left = 0;
      fullscreen.style.width = '100%';
      fullscreen.style.height = '100%';
      fullscreen.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
      fullscreen.style.zIndex = 9999;

      var imgElem = document.createElement('img');
      imgElem.src = img.src;
      imgElem.style.display = 'block';
      imgElem.style.maxWidth = '100%';
      imgElem.style.maxHeight = '100%';
      imgElem.style.margin = 'auto auto auto auto';
      fullscreen.appendChild(imgElem);

      document.body.appendChild(fullscreen);

      fullscreen.addEventListener('click', function () {
        document.body.removeChild(fullscreen);
      });
    }
  </script>
</body>

</html>