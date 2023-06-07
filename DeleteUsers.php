<?php
session_start();

if (!isset($_SESSION['UN'])) {
    header("location:index.php");
    exit;
}
$ut=$_SESSION['usertype'];
$usr=$_POST['user'];
require('DBinfo.php');
$query = "DELETE FROM $ut WHERE Uid= ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s",$usr );

$stmt->execute(); ?>
<html>

<body>
    <style>
        html {
            background-color: cornsilk;
        }

        h1 {
            margin-top: 15%;
        }

        div {
            background-color: white;
            width: 20%;
            height: 20%;
            border-radius: 5%;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            background-color: rgb(7, 138, 7);
            color: white;
            border: solid;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
            margin-top: 6%
        }

        button:hover {
            opacity: 0.7;
        }

        button:active {
            opacity: 0.6;
        }
    </style>
    <center>
        <h1>
            <?php 
            if ($stmt->affected_rows > 0) {
                echo "Record deleted successfully.";
            } else {
                echo "Error deleting record. Query: " . $query . ". Error: " . $stmt->error;
            }

            $stmt->close();
            $conn->close();
            ?>

        </h1>
        <div>
            <h2 class="a"><a href="manipulate.php" class="button">Home</a></h2>
            <h2 class="a"><a href="logout.php" class="button">Logout</a></h2>
        </div>
    </center>
</body>

</html>