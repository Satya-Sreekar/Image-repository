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
button {
  position: relative;
  background: #444;
  color: #fff;
  text-decoration: none;
  text-transform: uppercase;
  border: none;
  letter-spacing: 0.1rem;
  font-size: 1rem;
  padding: 1rem 3rem;
  transition: 0.2s;
}

button:hover {
  letter-spacing: 0.2rem;
  padding: 1.1rem 3.1rem;
  background: var(--clr);
  color: var(--clr);
  /* box-shadow: 0 0 35px var(--clr); */
  animation: box 3s infinite;
}

button::before {
  content: "";
  position: absolute;
  inset: 2px;
  background: #272822;
}

button span {
  position: relative;
  z-index: 1;
}
button i {
  position: absolute;
  inset: 0;
  display: block;
}

button i::before {
  content: "";
  position: absolute;
  width: 10px;
  height: 2px;
  left: 80%;
  top: -2px;
  border: 2px solid var(--clr);
  background: #272822;
  transition: 0.2s;
}

button:hover i::before {
  width: 15px;
  left: 20%;
  animation: move 3s infinite;
}

button i::after {
  content: "";
  position: absolute;
  width: 10px;
  height: 2px;
  left: 20%;
  bottom: -2px;
  border: 2px solid var(--clr);
  background: #272822;
  transition: 0.2s;
}

button:hover i::after {
  width: 15px;
  left: 80%;
  animation: move 3s infinite;
}

@keyframes move {
  0% {
    transform: translateX(0);
  }
  50% {
    transform: translateX(5px);
  }
  100% {
    transform: translateX(0);
  }
}

@keyframes box {
  0% {
    box-shadow: #27272c;
  }
  50% {
    box-shadow: 0 0 25px var(--clr);
  }
  100% {
    box-shadow: #27272c;
  }
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
button {
  position: relative;
  background: #444;
  color: black;
  margin-bottom:50px;
  text-decoration: none;
  text-transform: uppercase;
  border: none;
  letter-spacing: 0.1rem;
  font-size: 1rem;
  padding: 1rem 3rem;
  transition: 0.2s;
  box-shadow: 0 10px 20px 0 rgba(0,0,0,0.15);
}

button:hover {
  letter-spacing: 0.2rem;
  padding: 1.1rem 3.1rem;
  background: var(--clr);
  color: var(--clr);
  /* box-shadow: 0 0 35px var(--clr); */
  animation: box 3s infinite;
}

button::before {
  content: "";
  position: absolute;
  inset: 2px;
  background: white;
}

button span {
  position: relative;
  z-index: 1;
}
button i {
  position: absolute;
  inset: 0;
  display: block;
}

button i::before {
  content: "";
  position: absolute;
  width: 10px;
  height: 2px;
  left: 80%;
  top: -2px;
  border: 2px solid var(--clr);
  background: #272822;
  transition: 0.2s;
}

button:hover i::before {
  width: 15px;
  left: 20%;
  animation: move 3s infinite;
}

button i::after {
  content: "";
  position: absolute;
  width: 10px;
  height: 2px;
  left: 20%;
  bottom: -2px;
  border: 2px solid var(--clr);
  background: #272822;
  transition: 0.2s;
}

button:hover i::after {
  width: 15px;
  left: 80%;
  animation: move 3s infinite;
}

@keyframes move {
  0% {
    transform: translateX(0);
  }
  50% {
    transform: translateX(5px);
  }
  100% {
    transform: translateX(0);
  }
}

@keyframes box {
  0% {
    box-shadow: #27272c;
  }
  50% {
    box-shadow: 0 0 25px var(--clr);
  }
  100% {
    box-shadow: #27272c;
  }
}

</style>
<title>Administrator</title>
</head><div class='heading'>
<h1 class="ol">ADMIN</h1>
</div>
<body>
<form>   
<div class="login">
  <!--   <button style="--clr:#EA00FF"><span>Button</span><i></i></button> -->
  <!-- <button style="--clr:#FFF01F"><span>Button</span><i></i></button> -->
  <!-- <button style="--clr:#7FFF00"><span>Button</span><i></i></button> -->
  <!-- <button style="--clr:#FF5E00"><span>Button</span><i></i></button> -->
  <button type="submit" formaction="addusers.php"style="--clr:#39FF14"><span>ADD USERS</span><i></i></button>
  <!-- <button style="--clr:#FF3131"><span>Button</span><i></i></button> -->
  <!-- <button style="--clr:#1F51FF"><span>Button</span><i></i></button> -->
  <button type="submit" formaction="manipulatedata.php"style="--clr:#39FF14"><span>MANIPULATE CROP DATA</span><i></i></button>
  <!-- <button style="--clr:#BC13FE"><span>Button</span><i></i></button> -->
  <button type="submit" formaction="AdminDisplay.php" style="--clr:#39FF14"><span>VIEW APPROVED ENTRIES</span><i></i></button>
  <!-- <button style="--clr:#E7EE4F"><span>Button</span><i></i></button> -->
  <button type="submit" formaction="download.php"style="--clr:#39FF14"><span>Download All</span><i></i></button>
  <!-- <button style="--clr:#FF1493"><span>Button</span><i></i></button> -->
  <!-- <button style="--clr:#CCFF00"><span>Button</span><i></i></button> -->
</form>
</div>
</body>

</html>
