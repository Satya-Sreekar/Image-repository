<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['UN'])) {
    header("Location:index.php");
    exit;
}

require('DBinfo.php');
$_SESSION['Uid'] = $_POST['Uid'];
$_SESSION['pwd'] = $_POST['pwd'];

// Build the SQL query according to the selected user type
if ($_SESSION['usertype'] == 'User') {
    $sql = "INSERT INTO user (Uid, pd) VALUES ('" . $_SESSION['Uid'] . "', '" . $_SESSION['pwd'] . "')";
} elseif ($_SESSION['usertype'] == 'Approver') {
    $_SESSION['spz'] = $_POST['spz'];
    $sql = "INSERT INTO moderator (Uid, pd, spz) VALUES ('" . $_SESSION['Uid'] . "', '" . $_SESSION['pwd'] . "', '" . $_SESSION['spz'] . "')";
} elseif ($_SESSION['usertype'] == 'Admin') {
    $sql = "INSERT INTO admin (Uid, pd) VALUES ('" . $_SESSION['Uid'] . "', '" . $_SESSION['pwd'] . "')";
}

// Execute the query
if ($conn->query($sql) === TRUE) {
    $message = "New record created successfully";
} else {
    $message = "Error: " . $sql . "<br>" . $conn->error;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>ADD USERS</title>
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
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        p {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }
        button
        {
            padding: 10px 20px;
            background-color: #4AAF4E;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Users</h1>
        <p><?php echo $message; ?></p>
        <center><button onclick="window.location.href = 'logout.php';">Logout</button></center>
        
    </div>
</body>
</html>
