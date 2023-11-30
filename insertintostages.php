<?php
require('DBinfo.php');
$query="INSERT INTO `ssafflowerpest` (`stages`) VALUES ('N/A')";
if ($conn->query($sql) === TRUE) {
    $message = 'Record created successfully';
} else {
    $message = "'Error:' . $sql . '<br>'";
}
echo $message;
?>