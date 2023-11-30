<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESP32 Data Retrieval</title>
</head>

<body>
    <h1>ESP32 Data Retrieval</h1>

    <button onclick="getData()">Get Data</button>

    <div id="dataContainer">
        <!-- Tempat untuk menampilkan data -->
    </div>

    <script>
        function getData() {
            // Buat objek XMLHttpRequest
            var xhr = new XMLHttpRequest();

            // Tentukan metode, URL, dan apakah permintaan asinkron
            xhr.open("GET", "getData.php", true);

            // Atur fungsi yang akan dipanggil ketika permintaan selesai
            xhr.onload = function() {
                if (xhr.status == 200) {
                    // Tangkap dan tampilkan data
                    document.getElementById("dataContainer").innerHTML = xhr.responseText;
                } else {
                    // Tangkap dan tampilkan pesan kesalahan jika terjadi
                    document.getElementById("dataContainer").innerHTML = "Error: " + xhr.statusText;
                }
            };

            // Kirim permintaan
            xhr.send();
        }
    </script>
</body>

</html>