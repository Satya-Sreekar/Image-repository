<html>
    <head>
        <title>Validation Page</title>
    </head>
    <Body>
<?php
$un=$_GET["UserName"];
$pwd=$_GET["password"];
$rol=$_GET["role"];
echo "User Name: " . $un . "<br>Password: " . $pwd . "<br>Role: " . $rol;?>
</Body>
</html>