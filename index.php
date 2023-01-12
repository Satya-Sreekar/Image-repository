<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" href="index.css">
<?php session_start();
	if(isset($_SESSION['UN'])){
		header("location:welcome.php");
		exit;
	}
?>

<h1>LOGIN</h1>
<div class="log">
<div class="login">
<form action="/validation.php" method="POST">
  
  <label for="User"><h3>User Name:</h3></label>
  <input type="text" id="UserName" name="UserName" value="" placeholder="Enter your User Name">
  
  <label for="password"><h3>Password:</h3></label>
  <input type="password" id="password" name="password" value="" placeholder="Enter your Password">
  
  <label for="role"><h3>Role:</h3></label>
  <select id="role" name="role">
        <option value="User">User</option>
        <option value="Moderator">Moderator</option>
        <option value="Admin">Admin</option>
  </select><br>
  <input type="submit" value="Submit">
</form> 
  </div>
</div>
</body>
</html>
