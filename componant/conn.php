<?php


    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "reaya";

    $con = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);

    if (!$con) {
       die("Connection to database failed!");
    }
?>