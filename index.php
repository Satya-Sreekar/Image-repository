<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Image Repository</title>
  <link rel="stylesheet" href="index.css">
</head>
<!-- 
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
Author: P Satya Sreekar
Date:8-11-2023
Description: The first page of the web application 
Last Update:Fixec Heading

!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! 
-->
<body>
  <div class="morehead">
    <div class="heading">
      <img src="icar.png" alt="">
      <h1><i>TilhanTec</i> - Oilseeds Pests and Diseases Image Repository System V2.0</h1>
      <img src="iior-logo.jpg" alt="">
    </div>
    <center>
      <h5>(<i>TilhanTec</i> - OPDIRSV2.0)</h5>
    </center>
  </div>

  <div class="log">
    <div class="login">
      <center>
        <h2>LOGIN</h2>
      </center>
      <form action="./validation.php" method="POST">
        <label for="UserName">User Name:</label>
        <input type="text" id="UserName" name="UserName" placeholder="Enter your User Name" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your Password" required>
        <div class="select-container">
          <label for="role">Role:</label>
          <select id="role" name="role">
            <option value="User">User</option>
            <option value="Moderator">Approver</option>
            <option value="Admin">Admin</option>
          </select>
          <span class="select-arrow">&#9662;</span>
        </div>
        <input type="submit" value="Submit">
      </form>
      <div class='buttons'>
        <button onclick="window.location.href = 'Dash.php';">Dashboard</button>
        <button onclick="window.location.href = 'team/team.html';">Team</button>
      </div>


    </div>
  </div>
</body>
<footer>
  <h3>&copy;Developed by <a href="https://icar-iior.org.in/">ICAR-IIOR</a> in collaboration with <a
      href="https://klh.edu.in">KLEF</a>, Hyderabad</h3>
</footer>

</html>
