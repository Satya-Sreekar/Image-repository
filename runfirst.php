<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new mysqli($servername, $username, $password);
    $CDB = "CREATE DATABASE DB";
    $UDB = "USE DB";
    $conn->query($CDB);
    $conn->query($UDB);
    $createU = "CREATE TABLE User(UN VARCHAR(25) NOT NULL primary key, PD VARCHAR(20) NOT NULL,EID VARCHAR(20) NOT NULL,Phone VARCHAR(20) NOT NULL)";
    $sqlinsertU = "INSERT INTO User VALUES ('admin','admin','admin@gmail.com','9999999999')";
    $displayU = "SELECT * FROM User";
    $conn->query($createU);
    $conn->query($sqlinsertU);
    $conn->query($displayU);
    ?>