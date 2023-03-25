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
<style>
    body{
    margin:0%;
}
.ol{
    text-align:center;
    padding:0%;
    margin:0%;
}
.heading
{
    border: 2px solidrgba(72,172,76,251);
    background-color:rgba(74,174,78,253);
    margin-top: 0%;
    margin-bottom:7%;
    padding-top: 5px;
    padding-right: 90px;
    padding-bottom: 5px;
    padding-left: 90px;
    box-shadow: 0 10px 20px 0 rgba(0,0,0,0.15);
}

body{
        background:cornsilk;
}
.login{
    border: 2px solid rgb(0, 0, 0);
    position: relative;
    text-align: center;
    padding: 3%;
    padding-top:90px ;
    padding-bottom:50px ;
    padding-left: 70px;
    padding-right: 70px;
    width: 20%;
    height: 50%;
    margin: 20px auto;
    background:white;
    margin-top: 2.5%;
    margin-left: 37%;
    border-radius: 10px;
    box-shadow: 0 10px 20px 0 rgba(0,0,0,0.15);
}
.sc{
    padding-left: 15px;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-right: 15px;
    border-radius: 5px;
}
h1{
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin:0%;
    color: black;
    -webkit-text-stroke:1px black;
    -webkit-text-fill-color: white;
}
</style>
<body>
    <div class="heading">
        <center>
    <h1>Add Users</h1>
    </center>
    </div>
    <div class="login">
<form action='/uploadusers.php' method='POST'>
<select class='sc'id="usertype" name="usertype">
        <option value="User">User</option>
        <option value="Approver">Approver</option>
        <option value="Admin">Admin</option>
</select>
<input type="submit" onclick='/uploadusers.php' value="usersubmit">
</form>
</div>
</body>



</html>
