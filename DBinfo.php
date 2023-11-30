<?php

    $servername = "10.100.7.174";

    $username = "tilhantec_opdirs";

    $password = "Opdirs#070922";

    $conn = new mysqli($servername, $username, $password);

    $UDB = "USE tilhantec_opdirs";

    $dbname='tilhantec_opdirs';

    $conn->query($UDB);

    ?>