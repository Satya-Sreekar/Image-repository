<html>
<head>
<title>ADD USERS</title>
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

<form action='/uploadusers.php' method='POST'>
<select id="usertype" name="usertype">
        <option value="User">User</option>
        <option value="Approver">Approver</option>
        <option value="Admin">Admin</option>
</select>
<input type="submit" onclick='/uploadusers.php' value="usersubmit">
</form>

</body>



</html>