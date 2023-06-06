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

    $stmt = $conn->query("SELECT * FROM permdb");
    $data = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Approved Entries</title>
    <link rel="stylesheet" href="AdminDisplay.css">
    <meta charset="UTF-8">
</head>

<body>
    <div class="heading">
        <button onclick="window.location.href ='manipulate.php';">&#8249; Go Back</button>
        <center>
            <h1 class="h">Approved Entries</h1>
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
                        <form action="downloadone.php" method="POST">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input class="butt1" type="submit" name="download" value="Download &#x2913;">
                        </form>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="9">
                    <center><h3>Uploaded By: <?= $row['User'];?></h3></center>
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
            fullscreen.style.backgroundColor = 'rgba(0, 0, 0, 0.7)';
            fullscreen.style.display = 'flex';
            fullscreen.style.justifyContent = 'center';
            fullscreen.style.alignItems = 'center';
            fullscreen.style.zIndex = 9999;

            var imgElement = document.createElement('img');
            imgElement.src = img.src;
            imgElement.style.maxWidth = '90%';
            imgElement.style.maxHeight = '90%';

            fullscreen.appendChild(imgElement);
            fullscreen.onclick = function () {
                fullscreen.parentNode.removeChild(fullscreen);
            };

            document.body.appendChild(fullscreen);
        }
    </script>
</body>
</html>