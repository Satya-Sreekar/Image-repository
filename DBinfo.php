<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new mysqli($servername, $username, $password);
    $UDB = "USE myDB";
    $conn->query($UDB);
    ?>