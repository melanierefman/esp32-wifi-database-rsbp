<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "esp32";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query untuk mendapatkan satu set data terbaru dari tabel sensor
$sql = "SELECT data1, data2, data3, data4, data5 FROM sensor1 ORDER BY id DESC LIMIT 1";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output data dari satu baris terbaru
    $row = mysqli_fetch_assoc($result);
    echo "Data1: " . $row["data1"] . "<br>";
    echo "Data2: " . $row["data2"] . "<br>";
    echo "Data3: " . $row["data3"] . "<br>";
    echo "Data4: " . $row["data4"] . "<br>";
    echo "Data5: " . $row["data5"];
} else {
    echo "No data available";
}

mysqli_close($conn);
