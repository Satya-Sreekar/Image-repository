<!DOCTYPE HTML>
<html>
<head>
<?php
session_start ();
if (!isset($_SESSION['UN']))
{
    header("location:index.php");
    exit;
}
// Connect to the database
require('DBinfo.php');

?>
</head>
<body>

<h1>ADMIN</h1>

<form>
    <button type="submit" formaction="addusers.php">ADD USERS</button>
    <BR><BR>
    <button type="submit" formaction="manipulatedata.php">MANIPULATE CROP DATA</button>
    <BR><BR>
    <button type="submit" formaction="insertcredentials.php">VIEW APPROVED ENTRIES</button>
</form>

</body>

</html>