<?php
session_start();
if (!isset($_SESSION['UN'])) {
  header("location:index.php");
  exit;
}
$_SESSION['Crop'] = $_POST['Crop'];
$_SESSION['hs'] = $_POST['hs'];
require('DBinfo.php');
?>

<!DOCTYPE html>
<html>

<head>
  <title>Finish Deletion</title>
  <style>
    body {
      background: cornsilk;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .container {
      border: 2px solid rgba(72, 172, 76, 251);
      background-color: whitesmoke;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.15);
      text-align: center;
    }

    h1 {
      margin-bottom: 20px;
    }

    h2 {
      margin-bottom: 20px;
    }

    select,
    button {
      display: block;
      margin: 10px auto;
      padding: 10px 20px;
      font-size: 16px;
      background-color: rgba(74, 174, 78, 253);
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: rgba(74, 174, 78, 0.8);
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Select <?=$_SESSION['hs']?> to Delete</h2>
    <form action="finishpestdeletion.php" method="post">
      <select id="CropPest" name="CropPest">
      <?php
                if ($_SESSION['hs'] != 'ND') {
                    $c = $_SESSION['Crop'] . $_SESSION['hs'];
                    $C = "SELECT * FROM $c";
                    if ($result = $conn->query($C)) {
                        while ($row = $result->fetch_assoc()) {
                            $PName = $row["PName"];
                            $SName = $row["SCName"];
                            echo '<option value=' . urlencode($PName) . '>' . $PName . '</option>';
                        }
                        $result->free();
                    }
                } else {
                    $stmt = $conn->query("SELECT * FROM nutrients");
                    while ($row = $stmt->fetch_assoc()) {
                        $o = $row['name'];
                        echo '<option value=' . $o . '>' . $o . '</option> ';
                    }
                    $stmt->free_result();
                }
                ?>
      </select>
      <button type="submit" name="updatechange"
        onclick="return confirm(\'Are you sure you want to delete this?\')">DELETE</button>
    </form>
  </div>
</body>

</html>