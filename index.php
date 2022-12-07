<!DOCTYPE html>
<html>
<body>

<h2>Login to continue </h2>

<form action="/initialise.php" method="GET">
  <label for="User">User Name:</label><br>
  <input type="text" id="UserName" name="UserName" value=""><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" value=""><br>
  <label for="role">Role:</label><br>
  <select id="role" name="role" size="3">
        <option value="User">User</option>
        <option value="Moderator">Moderator</option>
        <option value="Admin">Admin</option>
  </select><br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>