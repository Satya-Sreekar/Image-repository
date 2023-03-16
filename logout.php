<?php
session_start();
echo $_SESSION["UN"].'<br>'.$_SESSION["Role"];//Remove In Final
session_unset();
session_destroy();
echo '<H1><Center>Sucessfully Logged Out</Center></H1><br>';
header( "refresh:2;url=index.php" );
?>
