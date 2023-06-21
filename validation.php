<?php
require 'DBinfo.php';

$un = $_POST["UserName"];
$pwd = $_POST["password"];
$rl = $_POST["role"];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the query based on the role
$query = "";
$table = "";

switch ($rl) {
    case "User":
        $table = "user";
        break;
    case "Moderator":
        $table = "moderator";
        break;
    case "Admin":
        $table = "admin";
        break;
    default:
        echo "<script>alert('User Not found! Try Again')</script>";
        echo "<script>location.href='index.php'</script>";
}

$query = "SELECT * FROM $table WHERE Uid = '$un'";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row["pd"] === $pwd) {
        session_start();
        $_SESSION['UN'] = $un;
        $_SESSION['Role'] = $rl;

        switch ($rl) {
            case "User":
                header('Location: User.php');
                break;
            case "Moderator":
                header('Location: display.php');
                break;
            case "Admin":
                header('Location: manipulate.php');
                break;
        }
    } else {
        echo "<script>alert('Incorrect Password! Try Again')</script>";
        echo "<script>location.href='index.php'</script>";
    }
} else {
    echo "<script>alert('User Not found! Try Again')</script>";
    echo "<script>location.href='index.php'</script>";
}
?>
