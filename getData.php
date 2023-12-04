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

    // Format data sebagai array asosiatif
    $data = array(
        'Suhu Badan' => $row["data1"],
        'Tinggi Badan' => $row["data2"],
        'Tekanan Darah' => $row["data3"] . "/120",
        'Denyut Jantung' => $row["data4"],
        'Berat Badan' => $row["data5"]
    );

    // Mengubah data menjadi format JSON
    $json_data = json_encode($data);

    // Menampilkan data JSON
    echo $json_data;
} else {
    // Menampilkan pesan jika tidak ada data
    echo json_encode(array('error' => 'No data available'));
}

mysqli_close($conn);
