<?php

    $servername = "localhost";

    $username = "root";

    $password = "";

    $conn = new mysqli($servername, $username, $password);

    $UDB = "USE mydb";

    $dbname='mydb';

    $conn->query($UDB);

    ?>