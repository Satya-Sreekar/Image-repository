<?php

session_start ();

// Check if user is logged in
if (!isset($_SESSION['UN'])) {
    header("Location:index.php");
    exit;
}

require('DBinfo.php');
$_SESSION['Uid']      = $_POST['Uid'];
$_SESSION['pwd']      = $_POST['pwd'];

// Build the SQL query according to the selected user type
if ($_SESSION['usertype'] == 'User') {
    $sql = "INSERT INTO user (Uid, pd) VALUES ('".$_SESSION['Uid']."', '".$_SESSION['pwd']."')";
}

elseif ($_SESSION['usertype'] == 'Approver') {
    $_SESSION['spz'] = $_POST['spz'];
    $sql = "INSERT INTO moderator (Uid, pd, spz) VALUES ('".$_SESSION['Uid']."', '".$_SESSION['pwd']."', '".$_SESSION['spz']."')";
}

elseif ($_SESSION['usertype'] == 'Admin') {
    $sql = "INSERT INTO admin (Uid, pd) VALUES ('".$_SESSION['Uid']."', '".$_SESSION['pwd']."')";
}

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
