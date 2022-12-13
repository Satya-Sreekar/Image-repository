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
    color: Maroon;
    }
    h3{
      margin:0; padding:0;
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
input{
  margin:10px;
}
select{
  margin:10px 0px 10px 0px;
}
input[type=submit]{
  background-color: rgb(0,0,255);
  border-radius:15px;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  
}
input[type=submit]:hover{
  background-color: lightblue;
  border-radius:15px;
  border: none;
  text-color: rgb(64,0,32);
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  
}

</style>

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