<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" href="index.css">
<?php session_start();
	if(isset($_SESSION['UN'])){
		header("location:logout.php");
		exit;
	}
?>
<div class='heading'>
  <img src="icar.png" alt=""height=5% width=5%>
  <center>
  <h1 class='hh'>Oil Seeds Pests and Diseases Image Repository System V<span class='v'>2.0</span></h1>
  </center>
  <img src="iior-logo.jpg" alt=""height=5% width=5%>
</div>
<div class="log">
<div class="login">
<h2>LOGIN</h2>
<form action="./validation.php" method="POST">
  
  <label for="User"><h3>User Name:</h3></label>
  <input type="text" id="UserName" name="UserName" value="" placeholder="Enter your User Name" required>
  
  <label for="password"><h3>Password:</h3></label>
  <input type="password" id="password" name="password" value="" placeholder="Enter your Password" required>
  <div class="select-container">
  <label for="role"><h3>Role:</h3></label>
  <select id="role" name="role">
        <option value="User">User</option>
        <option value="Moderator">Approver</option>
        <option value="Admin">Admin</option>
  </select>
  <span class="select-arrow">&#9662;</span>
</div>
<br>
  <input type="submit" value="Submit">
</form> 
  </div>
</div>
</body>
</html>