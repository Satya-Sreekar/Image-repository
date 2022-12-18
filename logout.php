<?php
session_start();
echo $_SESSION["UN"].'<br>'.$_SESSION["Role"];
session_unset();
session_destroy();
echo '<H1><Center>Sucessfully Logged Out</Center></H1><br>';
?>