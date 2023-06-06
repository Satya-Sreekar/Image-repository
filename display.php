<?php
session_start();
if (!isset($_SESSION['UN'])) {
  header("location:index.php");
  exit;
}
require 'DBinfo.php';

// Get filter values from query parameters or set default values
$cropFilter = isset($_GET['crop']) ? $_GET['crop'] : '';
$stateFilter = isset($_GET['state']) ? $_GET['state'] : '';

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Build the SQL query with filters
  $sql = "SELECT * FROM tempdb WHERE 1=1";
  if (!empty($cropFilter)) {
    $sql .= " AND `CROP` = :crop";
  }
  if (!empty($stateFilter)) {
    $sql .= " AND `STATE` = :state";
  }

  // Prepare the statement and bind filter values
  $stmt = $conn->prepare($sql);
  if (!empty($cropFilter)) {
    $stmt->bindValue(':crop', $cropFilter);
  }
  if (!empty($stateFilter)) {
    $stmt->bindValue(':state', $stateFilter);
  }

  $stmt->execute();

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
  <div class="side-panel">
    <div class="filters">
      <h2>Filters</h2>
      <div>
        <label for="user-filter">USER:</label>
        <select id="user-filter" name="user">
          <option value="">All</option>
          <?php
          $userQuery = $conn->query("SELECT DISTINCT `User` FROM `tempdb`");
          $userData = $userQuery->fetchAll();
          foreach ($userData as $user) {
            $selected = ($_GET['user'] ?? '') == $user['User'] ? 'selected' : '';
            echo "<option value=\"{$user['User']}\" $selected>{$user['User']}</option>";
          }
          ?>
        </select>
      </div>
      <div>
        <label for="crop-filter">CROP:</label>
        <select id="crop-filter" name="crop">
          <option value="">All</option>
          <?php
          $cropQuery = $conn->query("SELECT DISTINCT `CROP` FROM `tempdb`");
          $cropData = $cropQuery->fetchAll();
          foreach ($cropData as $crop) {
            $selected = ($_GET['crop'] ?? '') == $crop['CROP'] ? 'selected' : '';
            echo "<option value=\"{$crop['CROP']}\" $selected>{$crop['CROP']}</option>";
          }
          ?>
        </select>
      </div>
      <div>
        <label for="month-filter">MONTH:</label>
        <select id="month-filter" name="month">
          <option value="">All</option>
          <?php
          $monthQuery = $conn->query("SELECT DISTINCT `MONTH` FROM `tempdb`");
          $monthData = $monthQuery->fetchAll();
          foreach ($monthData as $month) {
            $selected = ($_GET['month'] ?? '') == $month['MONTH'] ? 'selected' : '';
            echo "<option value=\"{$month['MONTH']}\" $selected>{$month['MONTH']}</option>";
          }
          ?>
        </select>
      </div>
      <div>
        <label for="parts-filter">PARTS AFFECTED:</label>
        <select id="parts-filter" name="parts">
          <option value="">All</option>
          <?php
          $partsQuery = $conn->query("SELECT DISTINCT `PARTS-AFFECTED` FROM `tempdb`");
          $partsData = $partsQuery->fetchAll();
          foreach ($partsData as $parts) {
            $selected = ($_GET['parts'] ?? '') == $parts['PARTS-AFFECTED'] ? 'selected' : '';
            echo "<option value=\"{$parts['PARTS-AFFECTED']}\" $selected>{$parts['PARTS-AFFECTED']}</option>";
          }
          ?>
        </select>
      </div>
      <div>
        <label for="state-filter">STATE:</label>
        <select id="state-filter" name="state">
          <option value="">All</option>
          <?php
          $stateQuery = $conn->query("SELECT DISTINCT `STATE` FROM `tempdb`");
          $stateData = $stateQuery->fetchAll();
          foreach ($stateData as $state) {
            $selected = ($_GET['state'] ?? '') == $state['STATE'] ? 'selected' : '';
            echo "<option value=\"{$state['STATE']}\" $selected>{$state['STATE']}</option>";
          }
          ?>
        </select>
      </div>
      
      <div>
        <button onclick="applyFilters()">Apply Filters</button>
        <button onclick="resetFilters()">Reset Filters</button>
      </div>
    </div>
  </div>
  <div class="content">
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
        <th rowspan='2'><h2 class="z">IMAGE</h2></th>
      </tr>
      <tr>
        <th><h2 class="z">SEASON</h2></th>
        <th><h2 class="z">PARTS AFFECTED</h2></th>
        <th><h2 class="z">HEALTH STATE</h2></th>
        <th><h2 class="z">AREA</h2></th>
        <th><h2 class="z">BACKGROUND</h2></th>
        <th><h2 class="z">SCI NAME</h2></th>
        <th><h2 class="z">IMAGE CONTENTS</h2></th>
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
          <td><center><?= $row['STATE'] ?></center></td>
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
          <td><center><?= $row['PARTS-AFFECTED'] ?></center></td>
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

              <form action="reject.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this?')">
                <input type=hidden name='id' value="<?= $id ?>">
                <input class='butt2' type='submit' onclick="return confirm('Are you sure you want to delete this?')"
                       value='Reject &#x2716;'></input>
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
            <center><h2>Uploaded By: <?= $row['User']; ?></h2></center>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
  <script>
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

    function applyFilters() {
      var userFilter = document.getElementById('user-filter').value;
      var cropFilter = document.getElementById('crop-filter').value;
      var monthFilter = document.getElementById('month-filter').value;
      var partsFilter = document.getElementById('parts-filter').value;
      var stateFilter = document.getElementById('state-filter').value;
      var url = 'display.php';

      if (userFilter || cropFilter || monthFilter || partsFilter || stateFilter) {
        url += '?';
        if (userFilter) {
          url += 'user=' + userFilter + '&';
        }
        if (cropFilter) {
          url += 'crop=' + cropFilter + '&';
        }
        if (monthFilter) {
          url += 'month=' + monthFilter + '&';
        }
        if (partsFilter) {
          url += 'parts=' + partsFilter + '&';
        }
        if (stateFilter) {
          url += 'state=' + stateFilter;
        }
      }

      window.location.href = url;
    }

    function resetFilters() {
      window.location.href = 'display.php';
    }
  </script>
</body>

</html>
