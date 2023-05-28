<html>

<head>
    <?php
    session_start();
    require('DBinfo.php');
    if (!isset($_SESSION['UN'])) {
        header("location:index.php");
        exit;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $uploads_dir = 'images/'; // set the directory path where images will be uploaded

        if (empty($_FILES['images']['name'][0])) { // check if no image files have been uploaded
            echo "<script>alert('Please select at least one image to upload.');</script>"; // display an alert message
        } else { // proceed with image upload process as normal
            // YOUR IMAGE UPLOAD CODE HERE
        }
    }
    ?>
    <title>
        Image Upload
    </title>
    <link rel="stylesheet" href="imup.css">
</head>

<body>
    <div class='heading'>
        <button onclick="window.location.href = 'user.php';">
            &larr; Go Back
        </button>
        <center>
            <h1>
                Image Upload
            </h1>
        </center>
        <button onclick="window.location.href = 'logout.php';">Logout</button>
    </div>
    <div id="box">
        <form action="Editupload.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <th align="center">
                        Background
                    </th>
                </tr>
                <tr>
                    <td>
                        <select name="bg" id="bg">
                            <option value="Lab">Lab</option>
                            <option value="Field">Field</option>
                            <option value="Background">With Background</option>
                        </select>
                    </td>
                </tr>
                <!--******************************************************************************************************* -->
                <?php
                if ($_SESSION['PORD'] == 'pest' || $_SESSION['PORD'] == 'disease') {
                    echo '<tr>
                    <th colspan="2">';
                    $c = "Select " . $_SESSION['CROP'] . " " . $_SESSION['PORD'];
                    echo $c . '-Scientific Name';
                    echo '</th>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <select id="Efr" name="Efr">';
                    $c = $_SESSION['CROP'] . $_SESSION['PORD'];
                    $C = "Select * FROM $c";
                    if ($result = $conn->query($C)) {
                        while ($row = $result->fetch_assoc()) {
                            $PName = $row["PName"];
                            $SName = $row["SCName"];
                            $val = $PName . '-' . $SName;
                            echo '<h1>
                                <option value=' . urlencode($val) . '>' . $val . '</option>
                            </h1>';
                        }
                        echo '</select>
                    </td>';
                    $result->free();
                }
                }
                ; ?>
                <!-- ******************************************************************************************************* -->
                <?php
                if ($_SESSION['PORD'] == 'pest') {
                    // Do something if PORD equals 'pest', case-insensitive

                    echo
                        "<tr>
                        <th>
                            What is in the picture?
                        </th>
                        <th>
                            Stage
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <select name=" . "Desc" . " id=" . "Desc" . ">
                                <option value=" . "part" . ">Effected Part</option>
                                <option value=" . "pest" . ">Pest</option>
                            </select>
                        </td>
                        <td align=" . "center" . ">
                            <select id=" . "Stage." . " name=" . "Stage" . ">";

                    $c = 's' . $_SESSION['CROP'] . $_SESSION['PORD'];
                    $C = "Select * FROM $c";
                    if ($result = $conn->query($C)) {
                        while ($row = $result->fetch_assoc()) {
                            $stage = $row["stages"];
                            echo '<h1><option value=' . urlencode($stage) . '>' . $stage . '</option></h1>';
                        }
                        echo
                            '</select>
                        </td>';
                    $result->free();
                }
                echo "
                        </td>
                    </tr>";
                } ?>
            </table>
            <input type="submit" value="Upload Images">
        </form>
    </div>
</body>

</html>
