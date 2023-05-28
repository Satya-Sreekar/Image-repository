<!DOCTYPE html>
<html>

<head>
    <title>Delete Crop Disease</title>
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

        h2 {
            margin-bottom: 20px;
        }

        select,button {
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
    <div class="container">
        <h2>Select Crop to Delete Diseases</h2>
        <form action="updatecropdisease.php" method="post">
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
            <button type="submit" name="cropsubmit">Next</button>
        </form>
    </div>
</body>

</html>
