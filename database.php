<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "esp32";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Database connection is OK<br>";

if (isset($_POST['data1']) && isset($_POST['data2']) && isset($_POST['data3']) && isset($_POST['data4']) && isset($_POST['data5'])) {
    $t = $_POST['data1'];
    $h = $_POST['data2'];
    $p = $_POST['data3'];
    $l = $_POST['data4'];
    $s = $_POST['data5'];

    $sql = "INSERT INTO sensor1 (data1, data2, data3, data4, data5) VALUES (" . $t . ", " . $h . ", " . $p . ", " . $l . ", " . $s . ")";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
