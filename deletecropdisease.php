<html>

<head>
    <title>Delete crop disease</title>
    <?php
    session_start();
    if (!isset($_SESSION['UN'])) {
        header("location:index.php");
        exit;
    }
    require('DBinfo.php');
    $C = "SELECT * FROM Crop";
    ?>
</head>

<body>
<form action="/updatecropdisease.php" method="post">
    <h2>Select Crop to delete diseases</h2>
    <select id="Crop" name="Crop">
        <?php
        // Display options for the select element based on database data
        if ($result = $conn->query($C)) {
            while ($row = $result->fetch_assoc()) {
                $Crop = $row["CName"];
                echo '<option value="' . $Crop . '">' . $Crop . '</option>';
            }
            $result->free();
        }
        ?>
    </select>
    <button type="submit" name="cropsubmit">NEXT</button>
</form>

</body>

</html>
