<!DOCTYPE html>
<html>
<body>
  <style>
    body {
      background-color: coral;
    margin:10%;
    font-family: 'Ubuntu', sans-serif;
	  background-size: 100% 110%;
    text-align:center;

    }
    h1,a{
    margin:0; padding:0;
    font-size:300%;
    color: lightgray;
    }
    .login {
  -webkit-border-radius: 10px 10px 10px 10px;
  border-radius: 10px 10px 10px 10px;
  background: #fff;
  padding: 30px;
  width: 90%;
  max-width: 300px;
  position: relative;
  padding: 30px;
  -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  text-align: center;

}
.log{
  display: flex;
  align-items: center;
  flex-direction: column; 
  justify-content: center;
  width: auto;
  min-height: 100%;
  padding: 20px;
}
h3{
    padding: 0px;
    margin: 0px;
}
input{
  margin:10px;
}
select{
  margin:10px 0px 10px 0px;
}
input[type=submit]{
  background-color: #81D8D0;
  border-radius:15px;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  
}
input[type=submit]:hover{
  background-color: rgb(0,0,255);
  border-radius:15px;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  
}

</style>

<h1>Login to Continue </h1>
<div class="log">
<div class="login">
<form action="/initialise.php" method="GET">
  <label for="User"><h3>User Name:</h3></label>
  <input type="text" id="UserName" name="UserName" value="">
  <label for="password"><h3>Password:</h3></label>
  <input type="password" id="password" name="password" value="">
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