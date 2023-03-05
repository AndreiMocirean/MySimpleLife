<?php
    $servername = "93.115.101.3";
    $username = "zymoro_mslqa";
    $password = "Db[o1O26B7~y";
    $dbname = "zymoro_mslqa";

    $conn = new mysqli($servername, $username, $password);
    $sql_createdb = "CREATE DATABASE IF NOT EXISTS $dbname";
    $sql_createtb = "CREATE TABLE IF NOT EXISTS notes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100),
        content VARCHAR(200),
        priority VARCHAR(15)
        )";

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $conn->query($sql_createdb);
    $conn->select_db($dbname);
    $conn->query($sql_createdb);

    return $conn;
?>
